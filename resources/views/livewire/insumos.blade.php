<div>
    <h1>Insumos</h1>
    <form wire:submit.prevent="{{ $selectedInsumoId ? 'update' : 'store' }}">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" wire:model="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea wire:model="descripcion" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" wire:model="cantidad" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha_ingreso">Fecha de Ingreso</label>
            <input type="date" wire:model="fecha_ingreso" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="albergue_id">Albergue</label>
            <select wire:model="albergue_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($albergues as $albergue)
                    <option value="{{ $albergue->id }}">{{ $albergue->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ $selectedInsumoId ? 'Actualizar' : 'Crear' }}</button>
        @if($selectedInsumoId)
            <button type="button" wire:click="resetInputFields" class="btn btn-secondary">Cancelar</button>
        @endif
    </form>

    <table class="table mt-5">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Fecha de Ingreso</th>
                <th>Albergue</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($insumos as $insumo)
                <tr>
                    <td>{{ $insumo->nombre }}</td>
                    <td>{{ $insumo->descripcion }}</td>
                    <td>{{ $insumo->cantidad }}</td>
                    <td>{{ $insumo->fecha_ingreso }}</td>
                    <td>{{ $insumo->albergue->nombre }}</td>
                    <td>
                        <button wire:click="edit({{ $insumo->id }})" class="btn btn-warning">Editar</button>
                        <button wire:click="destroy({{ $insumo->id }})" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</div>
