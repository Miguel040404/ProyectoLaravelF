<?php

namespace App\Livewire\Group;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Group;
use App\Models\Author;
// use App\Models\Performan;
use App\Models\Dressing_room;
use App\Models\Type_of_costume;
use App\Models\Prop;
use Illuminate\Support\Facades\View;
use Livewire\WithPagination;

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
    // public $performances_id;
    public $dressing_room_id;
    public $type_of_costumes_id;
    public $props_id;

    public function render()
    {
        $this->totalGroups = Group::count();
        $groups = Group::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate($this->cant);

        $authors = Author::all();

        // $performen = Performan::all();

        $dressing_rooms = Dressing_room::all();

        $type_of_costumes = Type_of_costume::all();

        $props = Prop::all();

        return View('livewire.group.group-component', [
            'groups' => $groups,

            'authors' => $authors,
            // 'performen' => $performen,
            'dressing_rooms' => $dressing_rooms,
            'type_of_costumes' => $type_of_costumes,
            'props' => $props
        ]);
    }


    public function saveGroup()
    {
        $validated = $this->validate([
            'name' => 'required|min:5|max:255',
            'type_group' => 'required|in:chirigota,cuarteto,coro,comparsa',
            'number_of_people' => 'required|integer|min:12',
            'place' => 'required',

            'author_id' => 'required|exists:authors,id',
            // 'performances_id' => 'required|exists:performen,id',
            'dressing_room_id' => 'required|exists:dressing_rooms,id',
            'type_of_costumes_id' => 'required|exists:type_of_costumes,id',
            'props_id' => 'required|exists:props,id',
        ]);

        Group::updateOrCreate(['id' => $this->Id], $validated);

        $this->resetGroupFields();
        $this->dispatch('close-modal', 'modalGroup');
    }

    public function editGroup(Group $group)
    {
        $this->Id = $group->id;
        $this->name = $group->name;
        $this->type_group = $group->type_group;
        $this->number_of_people = $group->number_of_people;
        $this->place = $group->place;
        $this->author_id = $group->author_id;
        // $this->performances_id = $group->performances_id;
        $this->dressing_room_id = $group->dressing_room_id;
        $this->type_of_costumes_id = $group->type_of_costumes_id;
        $this->props_id = $group->props_id;

        $this->dispatch('open-modal', 'modalGroup');
    }

    public function deleteGroup(Group $group)
    {
        $group->delete();
        $this->dispatch('close-modal', 'deleteModal');
    }

    public function newGroup()
    {
        $this->resetGroupFields();
        $this->dispatch('open-modal', 'modalGroup');
    }

    private function resetGroupFields()
    {
        $this->reset([
            'Id',
            'name',
            'type_group',
            'number_of_people',
            'place',

            'author_id',
            // 'performances_id',
            'dressing_room_id',
            'type_of_costumes_id',
            'props_id',

        ]);
        $this->resetValidation();
    }

    public function show(Group $group)
    {

        // dump($group);
        $this->Id = $group->id;
        $this->name = $group->name;
        $this->type_group = $group->type_group;
        $this->number_of_people = $group->number_of_people;
        $this->place = $group->place;

        // $this->author_id = $group->author_id;
        // $this->performances_id = $group->performances_id;
        // $this->dressing_room_id = $group->dressing_room_id;
        // $this->type_of_costumes_id = $group->type_of_costumes_id;
        // $this->props_id = $group->props_id;

        $this->dispatch('open-modal', 'viewModal'); 

    }
    public $deleteId;

    public function setDeleteId($Id)
    {
        $this->deleteId = $Id;
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
}
