<div class="tablasContenido p-4 bg-light shadow-lg rounded">

    <h1 class="text-primary text-center mb-4">AGRUPACIONES</h1>

    <div class="d-flex justify-content-end mt-4 mb-3">
        <a href="#" class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalGroup" wire:click='newGroup'>
            {{-- <a href="#" class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalGroup" wire:click='show(1)'> --}}

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
                    <th>Autor</th>

                    <th width="3%">...</th>
                    <th width="3%">...</th>
                    <th width="3%">...</th>
                </tr>
                </x-slot>

                @forelse ($groups as $group)
                <tr class="align-middle">
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->type_group }}</td>
                    <td>{{ $group->number_of_people }}</td>
                    <td>{{ $group->place }}</td>
                    <td>{{ $group->author->name_of_author }}</td>
                    <td>
                        <a href="#" title="Ver" class="btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#viewModal" wire:click='show({{$group->id}})'>
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalGroup" wire:click='editGroup({{$group->id}})' title="Editar" class="btn btn-info shadow-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click="setDeleteId({{ $group->id }})" title="Eliminar" class="btn btn-danger shadow-sm">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">No hay grupos disponibles.</td>
                </tr>
                @endforelse
        </x-table>

        <x-slot:cardFooter>
            {{ $groups->links()}}
            </x-slot>
    </x-card>

    {{-- <x-modal modalId="modalGroup" modalTitle="{{ $Id == 0 ? 'Crear Grupo' : 'Editar Grupo' }}">

    <form wire:submit="{{ $Id == 0 ? 'createGroup' : 'update(' . $Id . ')' }}">
        <div class="mb-3">
            <div class="form-group">
                <label for="name" class="fw-bold">Nombre</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nombre..." wire:model="name">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label for="type_group" class="fw-bold">Agrupación</label>
                <select class="form-control @error('type_group') is-invalid @enderror" id="type_group" wire:model="type_group">
                    <option value="" style="color: grey">--Seleccione una agrupación--</option>
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

        <div class="mb-3">
            <div class="form-group">
                <label for="number_of_people" class="fw-bold">Número de integrantes</label>
                <input type="number" class="form-control @error('number_of_people') is-invalid @enderror" id="number_of_people" placeholder="Número de integrantes..." min="1" wire:model="number_of_people">
                @error('number_of_people')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label for="place" class="fw-bold">Ciudad/Pueblo</label>
                <input type="text" class="form-control @error('place') is-invalid @enderror" id="place" placeholder="Ciudad/Pueblo..." wire:model="place">
                @error('place')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Sección agregada para Autor -->
        <div class="mb-3">
            <div class="form-group">
                <label for="author_id" class="fw-bold">Autor</label>
                <select class="form-control @error('author_id') is-invalid @enderror" id="author_id" wire:model="author_id" size="3" style="height: 100px; overflow-y: auto;">
                    <option value="" style="color: grey">--Seleccione un autor--</option>
                    @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name_of_author }}</option>
                    @endforeach
                </select>
                @error('author_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Sección agregada para Actuación -->
        <div class="mb-3">
            <div class="form-group">
                <label for="performances_id" class="fw-bold">Actuación</label>
                <select class="form-control @error('performances_id') is-invalid @enderror" id="performances_id" wire:model="performances_id" size="3" style="height: 100px; overflow-y: auto;">
                    <option value="" style="color: grey">--Seleccione una actuación--</option>
                    @foreach($performen as $performance)
                    <option value="{{ $performance->id }}">{{ $performance->date_performan }}</option>
                    @endforeach
                </select>
                @error('performances_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Sección agregada para los camerinos -->
            <div class="mb-3">
                <div class="form-group">
                    <label for="dressing_room_id" class="fw-bold">Camerinos</label>
                    <select class="form-control @error('dressing_room_id') is-invalid @enderror" id="dressing_room_id" wire:model="dressing_room_id" size="3" style="height: 100px; overflow-y: auto;">
                        <option value="" style="color: grey">--Seleccione un camerino--</option>
                        @foreach($dressing_rooms as $dressing_room)
                        <option value="{{ $dressing_room->id }}">{{ $dressing_room->number_of_dressing_rooms }}</option>
                        @endforeach
                    </select>
                    @error('dressing_room_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Sección agregada para tipo de disfraz -->
            <div class="mb-3">
                <div class="form-group">
                    <label for="type_of_costumes_id" class="fw-bold">Compañia de disfraces</label>
                    <select class="form-control @error('type_of_costumes_id') is-invalid @enderror" id="type_of_costumes_id" wire:model="type_of_costumes_id" size="3" style="height: 100px; overflow-y: auto;">
                        <option value="" style="color: grey">--Seleccione una compañia--</option>
                        @foreach($type_of_costumes as $type_of_costume)
                        <option value="{{ $type_of_costume->id }}">{{ $type_of_costume->name_of_company }}</option>
                        @endforeach
                    </select>
                    @error('type_of_costumes_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Sección agregada para el atrezo -->
            <div class="mb-3">
                <div class="form-group">
                    <label for="props_id" class="fw-bold">Cantidad de extras</label>
                    <select class="form-control @error('props_id') is-invalid @enderror" id="props_id" wire:model="props_id" size="3" style="height: 100px; overflow-y: auto;">
                        <option value="" style="color: grey">--Seleccione un número disponible--</option>
                        @foreach($props as $prop)
                        <option value="{{ $prop->id }}">{{ $prop->number_of_extra }}</option>
                        @endforeach
                    </select>
                    @error('props_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <hr>

            <div class="d-flex justify-content-center">
                <button class="btn btn-success px-4" type="submit">
                    {{ $Id == 0 ? 'Crear' : 'Editar' }}
                </button>
            </div>
    </form>
    </x-modal> --}}

    <x-modal modalId="modalGroup" modalTitle="{{ $Id == 0 ? 'Crear Grupo' : 'Editar Grupo' }}">

        <form wire:submit="saveGroup">
            <div class="mb-3">
                <div class="form-group">
                    <label for="name" class="fw-bold">Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nombre..." wire:model="name">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <div class="form-group">
                    <label for="type_group" class="fw-bold">Agrupación</label>
                    <select class="form-control @error('type_group') is-invalid @enderror" id="type_group" wire:model="type_group">
                        <option value="" style="color: grey">--Seleccione una agrupación--</option>
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

            <div class="mb-3">
                <div class="form-group">
                    <label for="number_of_people" class="fw-bold">Número de integrantes</label>
                    <input type="number" class="form-control @error('number_of_people') is-invalid @enderror" id="number_of_people" placeholder="Número de integrantes..." min="1" wire:model="number_of_people">
                    @error('number_of_people')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <div class="form-group">
                    <label for="place" class="fw-bold">Ciudad/Pueblo</label>
                    <input type="text" class="form-control @error('place') is-invalid @enderror" id="place" placeholder="Ciudad/Pueblo..." wire:model="place">
                    @error('place')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Sección agregada para Autor -->
            <div class="mb-3">
                <div class="form-group">
                    <label for="author_id" class="fw-bold">Autor</label>
                    <select class="form-control @error('author_id') is-invalid @enderror" id="author_id" wire:model="author_id" size="3" style="height: 100px; overflow-y: auto;">
                        <option value="" style="color: grey">--Seleccione un autor--</option>
                        @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name_of_author }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Sección agregada para Actuación AQUI DA EL FALLO-->

            {{-- <div class="mb-3">
                <div class="form-group">
                    <label for="performances_id" class="fw-bold">Actuación</label>
                    <select class="form-control @error('performances_id') is-invalid @enderror" id="performances_id" wire:model="performances_id" size="3" style="height: 100px; overflow-y: auto;">
                        <option value="" style="color: grey">--Seleccione una actuación--</option>
                        @foreach($performen as $performance)
                        <option value="{{ $performance->id }}">{{ $performance->date_performan }}</option>
                        @endforeach
                    </select>
                    @error('performances_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}


                <!-- Sección agregada para los camerinos -->
                <div class="mb-3">
                    <div class="form-group">
                        <label for="dressing_room_id" class="fw-bold">Camerinos</label>
                        <select class="form-control @error('dressing_room_id') is-invalid @enderror" id="dressing_room_id" wire:model="dressing_room_id" size="3" style="height: 100px; overflow-y: auto;">
                            <option value="" style="color: grey">--Seleccione un camerino--</option>
                            @foreach($dressing_rooms as $dressing_room)
                            <option value="{{ $dressing_room->id }}">{{ $dressing_room->number_of_dressing_rooms }}</option>
                            @endforeach
                        </select>
                        @error('dressing_room_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Sección agregada para tipo de disfraz -->
                <div class="mb-3">
                    <div class="form-group">
                        <label for="type_of_costumes_id" class="fw-bold">Compañia de disfraces</label>
                        <select class="form-control @error('type_of_costumes_id') is-invalid @enderror" id="type_of_costumes_id" wire:model="type_of_costumes_id" size="3" style="height: 100px; overflow-y: auto;">
                            <option value="" style="color: grey">--Seleccione una compañia--</option>
                            @foreach($type_of_costumes as $type_of_costume)
                            <option value="{{ $type_of_costume->id }}">{{ $type_of_costume->name_of_company }}</option>
                            @endforeach
                        </select>
                        @error('type_of_costumes_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Sección agregada para el atrezo -->
                <div class="mb-3">
                    <div class="form-group">
                        <label for="props_id" class="fw-bold">Cantidad de extras</label>
                        <select class="form-control @error('props_id') is-invalid @enderror" id="props_id" wire:model="props_id" size="3" style="height: 100px; overflow-y: auto;">
                            <option value="" style="color: grey">--Seleccione un número disponible--</option>
                            @foreach($props as $prop)
                            <option value="{{ $prop->id }}">{{ $prop->number_of_extra }}</option>
                            @endforeach
                        </select>
                        @error('props_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <hr>

                <div class="d-flex justify-content-center">
                    <button class="btn btn-success px-4" type="submit">
                        {{ $Id == 0 ? 'Crear' : 'Editar' }}
                    </button>
                </div>
        </form>
    </x-modal>



    <x-modal modalId="viewModal" modalTitle="Ver Grupo: {{$name}}">

        <div class="row">

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="view_name" class="fw-bold">Nombre</label>
                    <input type="text" class="form-control" value="{{ $name }}" disabled>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="view_type_group" class="fw-bold">Agrupación</label>
                    <input type="text" class="form-control" id="view_type_group" wire:model="type_group" disabled>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="view_number_of_people" class="fw-bold">Número de integrantes</label>
                    <input type="number" class="form-control" id="view_number_of_people" wire:model="number_of_people" disabled>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="view_place" class="fw-bold">Ciudad/Pueblo</label>
                    <input type="text" class="form-control" id="view_place" wire:model="place" disabled>
                </div>
            </div>

        </div>
    </x-modal>

    <x-modal modalId="deleteModal" modalTitle="Eliminar Grupo">
        <div class="text-center">
            <p class="fw-bold">¿Estás seguro de que deseas eliminar este grupo?</p>
            <p class="text-danger">Esta acción no se puede deshacer.</p>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancelar</button>
            <button class="btn btn-danger" wire:click="confirmDelete" data-bs-dismiss="modal">Eliminar</button>
        </div>
    </x-modal>

</div>
