<div>
    <h1>Adopciones</h1>
    <form wire:submit.prevent="{{ $selectedAdopcionId ? 'update' : 'store' }}">
        <div class="form-group">
            <label for="fecha_adopcion">Fecha de Adopción</label>
            <input type="date" wire:model="fecha_adopcion" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="estado_animal">Estado del Animal</label>
            <select wire:model="estado_animal" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="Adopción">Adopción</option>
                <option value="Adoptado">Adoptado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="comentario">Comentario</label>
            <textarea wire:model="comentario" class="form-control"></textarea>
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
        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <select wire:model="usuario_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ $selectedAdopcionId ? 'Actualizar' : 'Crear' }}</button>
        @if($selectedAdopcionId)
            <button type="button" wire:click="resetInputFields" class="btn btn-secondary">Cancelar</button>
        @endif
    </form>

    <table class="table mt-5">
        <thead>
            <tr>
                <th>Fecha de Adopción</th>
                <th>Estado del Animal</th>
                <th>Animal</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adopciones as $adopcion)
                <tr>
                    <td>{{ $adopcion->fecha_adopcion }}</td>
                    <td>{{ $adopcion->estado_animal }}</td>
                    <td>{{ $adopcion->animal->nombre }}</td>
                    <td>{{ $adopcion->usuario->name }}</td>
                    <td>
                        <button wire:click="edit({{ $adopcion->id }})" class="btn btn-warning">Editar</button>
                        <button wire:click="destroy({{ $adopcion->id }})" class="btn btn-danger">Eliminar</button>
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
