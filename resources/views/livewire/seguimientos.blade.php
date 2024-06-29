<div>
    <h1>Seguimientos</h1>
    <form wire:submit.prevent="{{ $selectedSeguimientoId ? 'update' : 'store' }}">
        <div class="form-group">
            <label for="estado_seguimiento">Estado del Seguimiento</label>
            <select wire:model="estado_seguimiento" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="En progreso">En progreso</option>
                <option value="Completado">Completado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea wire:model="observaciones" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" wire:model="fecha" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="adopcion_id">Adopción</label>
            <select wire:model="adopcion_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($adopciones as $adopcion)
                    <option value="{{ $adopcion->id }}">{{ $adopcion->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="animal_id">Animal</label>
            <select wire:model="animal_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($animales as $animal)
                    <option value="{{ $animal->id }}">{{ $animal->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ $selectedSeguimientoId ? 'Actualizar' : 'Crear' }}</button>
        @if($selectedSeguimientoId)
            <button type="button" wire:click="resetInputFields" class="btn btn-secondary">Cancelar</button>
        @endif
    </form>

    <table class="table mt-5">
        <thead>
            <tr>
                <th>Estado del Seguimiento</th>
                <th>Observaciones</th>
                <th>Fecha</th>
                <th>Adopción</th>
                <th>Animal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($seguimientos as $seguimiento)
                <tr>
                    <td>{{ $seguimiento->estado_seguimiento }}</td>
                    <td>{{ $seguimiento->observaciones }}</td>
                    <td>{{ $seguimiento->fecha }}</td>
                    <td>{{ $seguimiento->adopcion->id }}</td>
                    <td>{{ $seguimiento->animal->nombre }}</td>
                    <td>
                        <button wire:click="edit({{ $seguimiento->id }})" class="btn btn-warning">Editar</button>
                        <button wire:click="destroy({{ $seguimiento->id }})" class="btn btn-danger">Eliminar</button>
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
