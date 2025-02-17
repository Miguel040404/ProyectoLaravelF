<div class="tablasContenido p-4 bg-light shadow-lg rounded">
    <h1 class="text-primary text-center mb-4">AGRUPACIONES</h1>
    <div class="text-right mb-3">
        <a href="#" class="btn btn-primary shadow-sm float-right" data-bs-toggle="modal" data-bs-target="#modalGroup">
            Crear Grupo
        </a>
    </div>

    <x-card cardTitle="📌 Grupos ({{$totalGroups}}) ">
        <x-table>
            <x-slot:thead>
                <tr>
                    <th>Nombre</th>
                    <th>Agrupacion</th>
                    <th>Numero de integrantes</th>
                    <th>Ciudad/Pueblo</th>
                    <th width="3%">...</th>
                    <th width="3%">...</th>
                    <th width="3%">...</th>
                </tr>
                </x-slot>

                <tr class="align-middle">
                    {{-- <td>Grupo 1</td>
                    <td>Descripción 1</td>
                    <td>5</td>
                    <td>Cádiz</td> --}}

                     @forelse ($groups as $group)
                <tr class="align-middle">
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->type_group }}</td>
                    <td>{{ $group->number_of_people }}</td>
                    <td>{{ $group->place }}</td>
                    <td>
                        <x-button href="#" title="Ver" class="btn btn-success shadow-sm">
                            <i class="fas fa-eye"></i>
                        </x-button>
                    </td>
                    <td>
                        <x-button href="#" title="Editar" class="btn btn-info shadow-sm">
                            <i class="fas fa-edit"></i>
                        </x-button>
                    </td>
                    <td>
                        <x-button href="#" title="Eliminar" class="btn btn-danger shadow-sm">
                            <i class="fas fa-trash-alt"></i>
                        </x-button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No hay grupos disponibles.</td>
                </tr>
                @endforelse 
        </x-table>

        <x-slot:cardFooter>
            {{ $groups->links()}}
        </x-slot>
        
    </x-card>
    
    <x-modal modalId="modalGroup" modalTitle="Crear Grupo">
        <form wire:submit={{$Id==0 ? "createGroup" : "updateGroup($Id)"}}>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="name" class="fw-bold">Nombre</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
                            placeholder="Nombre" wire:model="name">
                        @error('name') 
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>
    
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="type_group" class="fw-bold">Agrupación</label>
                        <select class="form-control @error('type_group') is-invalid @enderror" id="type_group" wire:model="type_group">
                            <option value="">Seleccione una agrupación</option>
                            <option value="chirigota">Chirigota</option>
                            <option value="cuarteto">Cuarteto</option>
                            <option value="coro">Coro</option>
                            <option value="comparsa">Comparsa</option>
                        </select>
                        @error('type_group') 
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>
                
    
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="number_of_people" class="fw-bold">Número de integrantes</label>
                        <input type="number" class="form-control @error('number_of_people') is-invalid @enderror" 
                            id="number_of_people" placeholder="Número de integrantes" min="1" wire:model="number_of_people">
                        @error('number_of_people') 
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>
    
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="place" class="fw-bold">Ciudad/Pueblo</label>
                        <input type="text" class="form-control @error('place') is-invalid @enderror" id="place" 
                            placeholder="Ciudad/Pueblo" wire:model="place">
                        @error('place') 
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>
            </div>
    
            <hr>
    
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success px-4">{{$Id == 0 ? 'Crear' : 'Actualizar'}}</button>
            </div>
        </form>
    </x-modal>
</div>
