<?php
namespace App\Livewire\Author;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Author;
use Livewire\WithPagination;

#[Title('Autores')]
class AuthorComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $cant = 5;
    
    // Campos del autor
    public $authorId;
    public $name_of_author;
    public $number_of_authors;

    public function render()
    {
        $authors = Author::where('name_of_author', 'like', '%' . $this->search . '%')
                        ->orderBy('id', 'desc')
                        ->paginate($this->cant);

        return view('livewire.author.author-component', [
            'authors' => $authors
        ]);
    }

    public function saveAuthor()
    {
        $validated = $this->validate([
            'name_of_author' => 'required|min:3|max:255',
            'number_of_authors' => 'required|integer|min:1'
        ]);

        Author::updateOrCreate(['id' => $this->authorId], $validated);
        
        $this->resetAuthorFields();
        $this->dispatch('close-modal', 'modalAuthor');
    }

    public function editAuthor(Author $author)
    {
        $this->authorId = $author->id;
        $this->name_of_author = $author->name_of_author;
        $this->number_of_authors = $author->number_of_authors;
        
        $this->dispatch('open-modal', 'modalAuthor');
    }

    public function deleteAuthor(Author $author)
    {
        $author->delete();
        $this->dispatch('close-modal', 'deleteModal');
    }

    public function newAuthor()
    {
        $this->resetAuthorFields();
        $this->dispatch('open-modal', 'modalAuthor');
    }

    private function resetAuthorFields()
    {
        $this->reset([
            'authorId',
            'name_of_author',
            'number_of_authors'
        ]);
        $this->resetValidation();
    }

    public function show(Author $author)
    {
        $this->authorId = $author->id;
        $this->name_of_author = $author->name_of_author;
        $this->number_of_authors = $author->number_of_authors;
        $this->dispatch('open-modal', 'viewAuthorModal');
    }
    public $deleteId;

    public function setDeleteId ($authorId)
    {
        $this->deleteId = $authorId;
    }

    public function confirmDelete()
    {
        if ($this->deleteId) {
            $group = Author::find($this->deleteId);
            if ($group) {
                $group->delete();
            }
        }
    }

}