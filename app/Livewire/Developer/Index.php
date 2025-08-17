<?php

namespace App\Livewire\Developer;

use App\Models\Developer;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $skillFilter = '';
    public $seniorityFilter = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'skillFilter' => ['except' => ''],
        'seniorityFilter' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSkillFilter()
    {
        $this->resetPage();
    }

    public function updatingSeniorityFilter()
    {
        $this->resetPage();
    }

    public function delete($developerId)
    {
        $developer = Developer::where('user_id', auth()->id())->findOrFail($developerId);
        $developer->delete();
        
        session()->flash('message', 'Desenvolvedor excluído com sucesso!');
    }

    public function render()
    {
        $developers = Developer::where('user_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->when($this->skillFilter, function ($query) {
                $query->whereJsonContains('skills', $this->skillFilter);
            })
            ->when($this->seniorityFilter, function ($query) {
                $query->where('seniority', $this->seniorityFilter);
            })
            ->withCount('articles')
            ->paginate(12);

        return view('livewire.developer.index', compact('developers'))
            ->layout('layouts.app');
    }
}
