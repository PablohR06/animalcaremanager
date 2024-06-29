<div>
    <h1>Animales</h1>
    <form wire:submit.prevent="{{ $selectedAnimalId ? 'update' : 'store' }}">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" wire:model="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="sexo">Sexo</label>
            <select wire:model="sexo" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tamano">Tamaño</label>
            <select wire:model="tamano" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="Pequeño">Pequeño</option>
                <option value="Mediano">Mediano</option>
                <option value="Grande">Grande</option>
            </select>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="text" wire:model="foto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="edad">Edad</label>
            <input type="text" wire:model="edad" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="comentario">Comentario</label>
            <textarea wire:model="comentario" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="estado_esterilizacion">Estado de Esterilización</label>
            <select wire:model="estado_esterilizacion" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="estado_chip">Estado de Chip</label>
            <select wire:model="estado_chip" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="estado_salud">Estado de Salud</label>
            <select wire:model="estado_salud" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="Buen estado">Buen estado</option>
                <option value="Caso Urgente">Caso Urgente</option>
            </select>
        </div>
        <div class="form-group">
            <label for="estadoanimal">Estado del Animal</label>
            <select wire:model="estadoanimal" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="Adopción">Adopción</option>
                <option value="Adoptado">Adoptado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_registro">Fecha de Registro</label>
            <input type="date" wire:model="fecha_registro" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="especie">Especie</label>
            <select wire:model="especie" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="Perro">Perro</option>
                <option value="Gato">Gato</option>
            </select>
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
        <button type="submit" class="btn btn-primary">{{ $selectedAnimalId ? 'Actualizar' : 'Crear' }}</button>
        @if($selectedAnimalId)
            <button type="button" wire:click="resetInputFields" class="btn btn-secondary">Cancelar</button>
        @endif
    </form>

    <table class="table mt-5">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Sexo</th>
                <th>Tamaño</th>
                <th>Edad</th>
                <th>Especie</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animales as $animal)
                <tr>
                    <td>{{ $animal->nombre }}</td>
                    <td>{{ $animal->sexo }}</td>
                    <td>{{ $animal->tamano }}</td>
                    <td>{{ $animal->edad }}</td>
                    <td>{{ $animal->especie }}</td>
                    <td>{{ $animal->estadoanimal }}</td>
                    <td>
                        <button wire:click="edit({{ $animal->id }})" class="btn btn-warning">Editar</button>
                        <button wire:click="destroy({{ $animal->id }})" class="btn btn-danger">Eliminar</button>
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
