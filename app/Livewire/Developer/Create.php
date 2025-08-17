<?php

namespace App\Livewire\Developer;

use App\Models\Developer;
use Livewire\Component;

class Create extends Component
{
    public $name = '';
    public $email = '';
    public $seniority = '';
    public $skills = [];
    public $newSkill = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:developers,email',
        'seniority' => 'required|in:Jr,Pl,Sr',
        'skills' => 'required|array|min:1',
    ];

    protected $messages = [
        'name.required' => 'O nome é obrigatório.',
        'email.required' => 'O email é obrigatório.',
        'email.email' => 'O email deve ser um endereço válido.',
        'email.unique' => 'Este email já está cadastrado.',
        'seniority.required' => 'A senioridade é obrigatória.',
        'seniority.in' => 'A senioridade deve ser Jr, Pl ou Sr.',
        'skills.required' => 'Pelo menos uma skill é obrigatória.',
        'skills.min' => 'Pelo menos uma skill é obrigatória.',
    ];

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
        $this->validate();

        Developer::create([
            'name' => $this->name,
            'email' => $this->email,
            'seniority' => $this->seniority,
            'skills' => $this->skills,
            'user_id' => auth()->id(),
        ]);

        session()->flash('message', 'Desenvolvedor criado com sucesso!');
        
        return redirect()->route('developers.index');
    }

    public function render()
    {
        return view('livewire.developer.create')
            ->layout('layouts.app');
    }
}
