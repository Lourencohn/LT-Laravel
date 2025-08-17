<?php

namespace App\Livewire\Article;

use App\Models\Article;
use App\Models\Developer;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Article $article;
    public $title = '';
    public $content = '';
    public $published_at = '';
    public $cover_image;
    public $selectedDevelopers = [];

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'published_at' => 'required|date',
        'cover_image' => 'nullable|image|max:2048',
        'selectedDevelopers' => 'required|array|min:1',
    ];

    protected $messages = [
        'title.required' => 'O título é obrigatório.',
        'content.required' => 'O conteúdo é obrigatório.',
        'published_at.required' => 'A data de publicação é obrigatória.',
        'published_at.date' => 'A data de publicação deve ser uma data válida.',
        'cover_image.image' => 'O arquivo deve ser uma imagem.',
        'cover_image.max' => 'A imagem deve ter no máximo 2MB.',
        'selectedDevelopers.required' => 'Pelo menos um desenvolvedor deve ser selecionado.',
        'selectedDevelopers.min' => 'Pelo menos um desenvolvedor deve ser selecionado.',
    ];

    public function mount(Article $article)
    {
        if ($article->user_id !== auth()->id()) {
            abort(403);
        }

        $this->article = $article;
        $this->title = $article->title;
        $this->content = $article->content;
        $this->published_at = $article->published_at->format('Y-m-d');
        $this->selectedDevelopers = $article->developers->pluck('id')->toArray();
    }

    public function save()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'content' => $this->content,
            'published_at' => $this->published_at,
        ];

        if ($this->cover_image) {
            if ($this->article->cover_image) {
                \Storage::disk('public')->delete('covers/' . $this->article->cover_image);
            }
            $coverImagePath = $this->cover_image->store('covers', 'public');
            $data['cover_image'] = basename($coverImagePath);
        }

        $this->article->update($data);
        $this->article->developers()->sync($this->selectedDevelopers);

        session()->flash('message', 'Artigo atualizado com sucesso!');
        
        return redirect()->route('articles.index');
    }

    public function render()
    {
        $developers = Developer::where('user_id', auth()->id())->get();
        
        return view('livewire.article.edit', compact('developers'))
            ->layout('layouts.app');
    }
}
