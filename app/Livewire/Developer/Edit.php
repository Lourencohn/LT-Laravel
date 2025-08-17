<?php

namespace App\Livewire\Developer;

use App\Models\Developer;
use Livewire\Component;

class Edit extends Component
{
    public Developer $developer;
    public $name = '';
    public $email = '';
    public $seniority = '';
    public $skills = [];
    public $newSkill = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'seniority' => 'required|in:Jr,Pl,Sr',
        'skills' => 'required|array|min:1',
    ];

    protected $messages = [
        'name.required' => 'O nome é obrigatório.',
        'email.required' => 'O email é obrigatório.',
        'email.email' => 'O email deve ser um endereço válido.',
        'seniority.required' => 'A senioridade é obrigatória.',
        'seniority.in' => 'A senioridade deve ser Jr, Pl ou Sr.',
        'skills.required' => 'Pelo menos uma skill é obrigatória.',
        'skills.min' => 'Pelo menos uma skill é obrigatória.',
    ];

    public function mount(Developer $developer)
    {
        if ($developer->user_id !== auth()->id()) {
            abort(403);
        }

        $this->developer = $developer;
        $this->name = $developer->name;
        $this->email = $developer->email;
        $this->seniority = $developer->seniority;
        $this->skills = $developer->skills ?? [];
    }

    public function addSkill()
    {
        if ($this->newSkill && !in_array($this->newSkill, $this->skills)) {
            $this->skills[] = $this->newSkill;
            $this->newSkill = '';
        }
    }

    public function removeSkill($index)
    {
        unset($this->skills[$index]);
        $this->skills = array_values($this->skills);
    }

    public function save()
    {
        $this->rules['email'] = 'required|email|unique:developers,email,' . $this->developer->id;
        $this->validate();

        $this->developer->update([
            'name' => $this->name,
            'email' => $this->email,
            'seniority' => $this->seniority,
            'skills' => $this->skills,
        ]);

        session()->flash('message', 'Desenvolvedor atualizado com sucesso!');
        
        return redirect()->route('developers.index');
    }

    public function render()
    {
        return view('livewire.developer.edit')
            ->layout('layouts.app');
    }
}
