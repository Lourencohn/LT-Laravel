<?php

namespace App\Livewire;

use Livewire\Component;

class ThemeToggle extends Component
{
    public $darkMode = false;

    public function mount()
    {
        $this->darkMode = request()->cookie('darkMode') === 'true';
    }

    public function toggle()
    {
        $this->darkMode = !$this->darkMode;
        
        cookie()->queue('darkMode', $this->darkMode ? 'true' : 'false', 60 * 24 * 365); // 1 ano
        
        $this->dispatch('theme-changed', $this->darkMode);
    }

    public function render()
    {
        return view('livewire.theme-toggle');
    }
}