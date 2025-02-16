<?php

namespace App\Livewire\Group;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Grupos')]

class GroupComponent extends Component
{

    public function render()
    {
        return view('livewire.group.group-component');
    }
}
