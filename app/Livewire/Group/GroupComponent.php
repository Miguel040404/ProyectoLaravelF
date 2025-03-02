<?php

namespace App\Livewire\Group;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Group;
use Illuminate\Support\Facades\View;
use Livewire\WithPagination;

#[Title('Grupos')]

class GroupComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $totalGroups = 0;
    public $cant = 5;

    public $Id;
    public $name;
    public $type_group;
    public $number_of_people;
    public $place;

    public function render()
    {
        $this->totalGroups = Group::count();

        // if ($this->search != '') {
        //     $this->resetPage();
        // }

        $groups = Group::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate($this->cant);

        return View(
            'livewire.group.group-component',
            [
                'groups' => $groups
            ]
        );
    }

    // public function mount()
    // {
    //     $this->totalGroups = Group::count();
    // }

    public function createGroup()
    {

        // dump("CREAR GROUP");
        $rules = [
            'name' => 'required|min:5|max:255',
            'type_group' => 'required',
            'number_of_people' => 'required|integer|min:12',
            'type_group' => 'required|in:chirigota,cuarteto,coro,comparsa',
            'place' => 'required'
        ];
        $messages = [
            'name.required' => 'El campo Nombre es requerido',
            'name.min' => 'El Nombre debe tener al menos 5 caracteres',
            'type_group.required' => 'El campo Agrupación es requerido',
            'number_of_people.required' => 'El campo Número de integrantes es requerido',
            'number_of_people.integer' => 'Debe ser un número entero',
            'number_of_people.min' => 'Debe haber al menos 12 integrante',
            'place.required' => 'El campo Ciudad/Pueblo es requerido'
        ];

        $this->validate($rules, $messages);

        $group = new Group();
        $group->name = $this->name;
        $group->type_group = $this->type_group;
        $group->number_of_people = $this->number_of_people;
        $group->place = $this->place;
        $group->save();


        $this->dispatch('close-modal', 'modalGroup');

        $this->reset(['name', 'type_group', 'number_of_people', 'place', 'Id']);

    }

    public function edit(Group $group)
    {

        $this->Id = $group->id;
        $this->name = $group->name;
        $this->type_group = $group->type_group;
        $this->number_of_people = $group->number_of_people;
        $this->place = $group->place;

        $this->dispatch('open-modal', 'modalGroup');
    }

    public function crearNuevo()
    {
        $this->reset(['name', 'type_group', 'number_of_people', 'place', 'Id']);
        
        $this->Id=0;

        $this->resetValidation();

        $this->dispatch('open-modal', 'modalGroup');
    }

    public function update(Group $group)
    {
        // dump("UPD GROUP");
        $rules = [
            'name' => 'required|min:5|max:255',
            'type_group' => 'required|in:chirigota,cuarteto,coro,comparsa',
            'number_of_people' => 'required|integer|min:12',
            'place' => 'required'
        ];

        $messages = [
            'name.required' => 'El campo Nombre es requerido',
            'name.min' => 'El Nombre debe tener al menos 5 caracteres',
            'type_group.required' => 'El campo Agrupación es requerido',
            'number_of_people.required' => 'El campo Número de integrantes es requerido',
            'number_of_people.integer' => 'Debe ser un número entero',
            'number_of_people.min' => 'Debe haber al menos 12 integrantes',
            'place.required' => 'El campo Ciudad/Pueblo es requerido'
        ];

        $this->validate($rules, $messages);

        $group->name = $this->name;
        $group->type_group = $this->type_group;
        $group->number_of_people = $this->number_of_people;
        $group->place = $this->place;

        $group->update();

        $this->reset(['name', 'type_group', 'number_of_people', 'place', 'Id']);
        $this->dispatch('close-modal', 'modalGroup');
    }


    public function show(Group $group)
    {
        $this->Id = $group->id;
        $this->name = $group->name;
        $this->type_group = $group->type_group;
        $this->number_of_people = $group->number_of_people;
        $this->place = $group->place;
    }

    public $deleteId;

    public function setDeleteId($id)
    {
        $this->deleteId = $id;
    }

    public function confirmDelete()
    {
        if ($this->deleteId) {
            $group = Group::find($this->deleteId);
            if ($group) {
                $group->delete();
                // $this->emit('alert', 'success', 'Grupo eliminado correctamente');
            }
        }
    }

    function cerrarModal()
    {
        $this->dispatch('close-modal', 'modalGroup');
    }
}
