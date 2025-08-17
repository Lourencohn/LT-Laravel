<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($articleId)
    {
        $article = Article::where('user_id', auth()->id())->findOrFail($articleId);
        
        if ($article->cover_image) {
            \Storage::disk('public')->delete('covers/' . $article->cover_image);
        }
        
        $article->delete();
        
        session()->flash('message', 'Artigo excluído com sucesso!');
    }

    public function render()
    {
        $articles = Article::where('user_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('content', 'like', '%' . $this->search . '%');
            })
            ->withCount('developers')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('livewire.article.index', compact('articles'))
            ->layout('layouts.app');
    }
}
