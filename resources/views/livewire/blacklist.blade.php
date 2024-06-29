<div>
    <h1>Lista Negra</h1>

    <table class="table mt-5">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blacklistedUsers as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button wire:click="removeFromBlacklist({{ $user->id }})" class="btn btn-danger">Eliminar de Lista Negra</button>
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
