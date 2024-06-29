<div>
    <h1>Albergues</h1>
    <form wire:submit.prevent="{{ $selectedAlbergueId ? 'update' : 'store' }}">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" wire:model="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" wire:model="direccion" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="capacidad">Capacidad</label>
            <input type="number" wire:model="capacidad" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <input type="text" wire:model="ciudad" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" wire:model="telefono" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="encargado_id">Encargado</label>
            <select wire:model="encargado_id" class="form-control">
                <option value="">Sin encargado</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ $selectedAlbergueId ? 'Actualizar' : 'Crear' }}</button>
        @if($selectedAlbergueId)
            <button type="button" wire:click="resetInputFields" class="btn btn-secondary">Cancelar</button>
        @endif
    </form>

    <table class="table mt-5">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Capacidad</th>
                <th>Ciudad</th>
                <th>Teléfono</th>
                <th>Encargado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albergues as $albergue)
                <tr>
                    <td>{{ $albergue->nombre }}</td>
                    <td>{{ $albergue->direccion }}</td>
                    <td>{{ $albergue->capacidad }}</td>
                    <td>{{ $albergue->ciudad }}</td>
                    <td>{{ $albergue->telefono }}</td>
                    <td>{{ $albergue->encargado ? $albergue->encargado->name : 'Sin encargado' }}</td>
                    <td>
                        <button wire:click="edit({{ $albergue->id }})" class="btn btn-warning">Editar</button>
                        <button wire:click="destroy({{ $albergue->id }})" class="btn btn-danger">Eliminar</button>
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
