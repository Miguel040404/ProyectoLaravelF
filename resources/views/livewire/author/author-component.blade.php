<div class="tablasContenido p-4 bg-light shadow-lg rounded">
    <h1 class="text-primary text-center mb-4">AUTORES</h1>

    <div class="d-flex justify-content-end mt-4 mb-3">
        <a href="#" class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalAuthor" wire:click='newAuthor'>
            Crear Autor
        </a>
    </div>

    <x-card cardTitle="✒️ Autores ({{$authors->total()}})">
        <x-table>
            <x-slot:thead>
                <tr>
                    <th>Nombre del Autor</th>
                    <th>Número de Autores</th>
                    <th width="3%">...</th>
                    <th width="3%">...</th>
                    <th width="3%">...</th>
                </tr>
            </x-slot>

            @forelse ($authors as $author)
            <tr class="align-middle">
                <td>{{ $author->name_of_author }}</td>
                <td>{{ $author->number_of_authors }}</td>
                <td>
                    <a href="#" title="Ver" class="btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#viewAuthorModal" wire:click='show( {{$author->id}} )'>
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAuthor" wire:click='editAuthor( {{$author->id}} )' title="Editar" class="btn btn-info shadow-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteAuthorModal" wire:click="setDeleteId({{ $author->id }})" title="Eliminar" class="btn btn-danger shadow-sm">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted">No hay autores disponibles.</td>
            </tr>
            @endforelse
        </x-table>

        <x-slot:cardFooter>
            {{ $authors->links() }}
        </x-slot>
    </x-card>

    <x-modal modalId="modalAuthor" modalTitle="{{ $authorId ? 'Editar Autor' : 'Crear Autor' }}">
        <form wire:submit="saveAuthor">
            <div class="mb-3">
                <div class="form-group">
                    <label for="name_of_author" class="fw-bold">Nombre del Autor</label>
                    <input type="text" class="form-control @error('name_of_author') is-invalid @enderror" 
                           id="name_of_author" placeholder="Nombre del autor..." 
                           wire:model="name_of_author">
                    @error('name_of_author')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <div class="form-group">
                    <label for="number_of_authors" class="fw-bold">Número de Autores</label>
                    <input type="number" class="form-control @error('number_of_authors') is-invalid @enderror" 
                           id="number_of_authors" placeholder="Número de autores..." 
                           min="1" wire:model="number_of_authors">
                    @error('number_of_authors')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <div class="d-flex justify-content-center">
                <button class="btn btn-success px-4" type="submit">
                    {{ $authorId ? 'Actualizar' : 'Crear' }}
                </button>
            </div>
        </form>
    </x-modal>

    <x-modal modalId="viewAuthorModal" modalTitle="Ver Autor: {{$name_of_author}}">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label class="fw-bold">Nombre del Autor</label>
                    <input type="text" class="form-control" value="{{ $name_of_author }}" disabled>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label class="fw-bold">Número de Autores</label>
                    <input type="number" class="form-control" value="{{ $number_of_authors }}" disabled>
                </div>
            </div>
        </div>
    </x-modal>

    <x-modal modalId="deleteAuthorModal" modalTitle="Eliminar Autor">
        <div class="text-center">
            <p class="fw-bold">¿Estás seguro de que deseas eliminar este autor?</p>
            <p class="text-danger">Esta acción no se puede deshacer.</p>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancelar</button>
            <button class="btn btn-danger" wire:click="confirmDelete" data-bs-dismiss="modal">Eliminar</button>
        </div>
    </x-modal>
</div>

{{-- <div>
    <h1>Autores</h1>
</div> --}}