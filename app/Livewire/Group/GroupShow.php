<?php

namespace App\Livewire\Group;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Ver Grupo')]

class GroupShow extends Component
{
    public function render()
    {
        return view('livewire.group.group-show');
    }
}
