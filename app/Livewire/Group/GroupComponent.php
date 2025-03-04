<?php
namespace App\Livewire\Group;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Group;
use App\Models\Author;
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
    public $author_id;

    public function render()
    {
        $this->totalGroups = Group::count();
        $groups = Group::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate($this->cant);
        $authors = Author::all();

        return View('livewire.group.group-component', [
            'groups' => $groups,
            'authors' => $authors,
        ]);
    }

    public function createGroup()
    {
        $rules = [
            'name' => 'required|min:5|max:255',
            'type_group' => 'required|in:chirigota,cuarteto,coro,comparsa',
            'number_of_people' => 'required|integer|min:12',
            'place' => 'required',
            'author_id' => 'required|exists:authors,id',
        ];

        $messages = [
            'name.required' => 'El campo Nombre es requerido',
            'name.min' => 'El Nombre debe tener al menos 5 caracteres',
            'type_group.required' => 'El campo Agrupación es requerido',
            'number_of_people.required' => 'El campo Número de integrantes es requerido',
            'number_of_people.integer' => 'Debe ser un número entero',
            'number_of_people.min' => 'Debe haber al menos 12 integrantes',
            'place.required' => 'El campo Ciudad/Pueblo es requerido',
            'author_id.required' => 'El campo Autor es requerido',
        ];

        $this->validate($rules, $messages);

        $group = new Group();
        $group->name = $this->name;
        $group->type_group = $this->type_group;
        $group->number_of_people = $this->number_of_people;
        $group->place = $this->place;
        $group->author_id = $this->author_id;
        $group->save();

        $this->dispatch('close-modal', 'modalGroup');
        $this->resetFields();
    }

    public function edit(Group $group)
    {
        $this->Id = $group->id;
        $this->name = $group->name;
        $this->type_group = $group->type_group;
        $this->number_of_people = $group->number_of_people;
        $this->place = $group->place;
        $this->author_id = $group->author_id;

        $this->dispatch('open-modal', 'modalGroup');
    }

    public function crearNuevo()
    {
        $this->resetFields();
        $this->dispatch('open-modal', 'modalGroup');
    }

    public function update(Group $group)
    {
        $rules = [
            'name' => 'required|min:5|max:255',
            'type_group' => 'required|in:chirigota,cuarteto,coro,comparsa',
            'number_of_people' => 'required|integer|min:12',
            'place' => 'required',
            'author_id' => 'required|exists:authors,id',
        ];

        $messages = [
            'name.required' => 'El campo Nombre es requerido',
            'name.min' => 'El Nombre debe tener al menos 5 caracteres',
            'type_group.required' => 'El campo Agrupación es requerido',
            'number_of_people.required' => 'El campo Número de integrantes es requerido',
            'number_of_people.integer' => 'Debe ser un número entero',
            'number_of_people.min' => 'Debe haber al menos 12 integrantes',
            'place.required' => 'El campo Ciudad/Pueblo es requerido',
            'author_id.required' => 'El campo Autor es requerido',
        ];

        $this->validate($rules, $messages);

        $group->name = $this->name;
        $group->type_group = $this->type_group;
        $group->number_of_people = $this->number_of_people;
        $group->place = $this->place;
        $group->author_id = $this->author_id;
        $group->update();

        $this->dispatch('close-modal', 'modalGroup');
        $this->resetFields();
    }

    public function show(Group $group)
    {
        $this->Id = $group->id;
        $this->name = $group->name;
        $this->type_group = $group->type_group;
        $this->number_of_people = $group->number_of_people;
        $this->place = $group->place;
        $this->author_id = $group->author_id;
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
            }
        }
    }

    private function resetFields()
    {
        $this->reset(['name', 'type_group', 'number_of_people', 'place', 'Id', 'author_id']);
        $this->resetValidation();
    }

    function cerrarModal()
    {
        $this->dispatch('close-modal', 'modalGroup');
    }
}
