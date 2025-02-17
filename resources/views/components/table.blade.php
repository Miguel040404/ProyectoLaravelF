{{-- <div class="mb-3 d-flex justify-content-between">
    <div>
        <span>Mostrar</span>
        <select>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <span>Entradas</span>
    </div>
    <div>
        <input type="text" class="form-control" placeholder="Buscar...">
    </div>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                {{ $thead }}
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div> --}}

<div class="mb-3 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
        <span class="me-2">Mostrar</span>
        <select class="form-select form-select-sm border-0 bg-light text-dark shadow-sm" wire:model.live="cant">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        {{-- <span class="ms-2">Entradas</span> --}}
    </div>
    <div>
        <input type="text" class="form-control border-0 bg-light text-dark shadow-sm" wire:model.live="search" placeholder="🔍 Buscar...">
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover shadow-sm">
        <thead class="bg-primary text-white">
            <tr>
                {{ $thead }}
            </tr>
        </thead>
        <tbody class="bg-light">
            {{ $slot }}
        </tbody>
    </table>
</div>
