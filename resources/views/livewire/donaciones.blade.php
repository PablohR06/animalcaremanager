<div>
    <h1>Donaciones</h1>
    <form wire:submit.prevent="{{ $selectedDonacionId ? 'update' : 'store' }}">
        <div class="form-group">
            <label for="monto">Monto</label>
            <input type="text" wire:model="monto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" wire:model="fecha" class="form-control" required>
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
        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <select wire:model="usuario_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ $selectedDonacionId ? 'Actualizar' : 'Crear' }}</button>
        @if($selectedDonacionId)
            <button type="button" wire:click="resetInputFields" class="btn btn-secondary">Cancelar</button>
        @endif
    </form>

    <table class="table mt-5">
        <thead>
            <tr>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Albergue</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donaciones as $donacion)
                <tr>
                    <td>{{ $donacion->monto }}</td>
                    <td>{{ $donacion->fecha }}</td>
                    <td>{{ $donacion->albergue->nombre }}</td>
                    <td>{{ $donacion->usuario->name }}</td>
                    <td>
                        <button wire:click="edit({{ $donacion->id }})" class="btn btn-warning">Editar</button>
                        <button wire:click="destroy({{ $donacion->id }})" class="btn btn-danger">Eliminar</button>
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
