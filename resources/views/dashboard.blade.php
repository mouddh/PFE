
{{-- <x-layouts>
  


 @if(session('success'))
 <div class="alert alert-success">
     {{ session('success') }}
 </div>
 @endif
 <div class="container mt-5">
    <a href="/add" class="btn btn-primary mb-4">
        <i class="fas fa-plus"></i> Ajouter un utilisateur
    </a>
    
    <!-- Formulaire de recherche -->
    <form action="{{ url('/admin') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Rechercher un utilisateur...">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i> Rechercher</button>
            </div>
        </div>
    </form>

    <div class="card shadow">
        <div class="card-header bg-dark d-flex justify-content-between align-items-center">
            <h2 class="card-title mb-0">Les Clients</h2>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Utilisateur</th>
                        <th>Type</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->type }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telephone }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href="/update/{{ $user->id }}" class="btn btn-warning btn-sm" title="Modifier"><i class="fas fa-edit"></i></a>
                            <form class="d-inline" action="/admin/{{ $user->id }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Supprimer"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</x-layouts>> --}}
<x-layouts>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mt-5">
        <a href="/add" class="btn btn-primary mb-4">
            <i class="fas fa-plus"></i> Ajouter un utilisateur
        </a>

        <!-- Formulaire de recherche -->
        
        <div class="card shadow">
            <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                <h2 class="card-title mb-0">Les Clients</h2>
            </div>
            <div class="card-body table-responsive p-0">
                <table id="userTable" class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Utilisateur</th>
                            <th>Type</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->type }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->telephone }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href="/update/{{ $user->id }}" class="btn btn-warning btn-sm" title="Modifier"><i class="fas fa-edit"></i></a>
                                <form class="d-inline" action="/admin/{{ $user->id }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Supprimer"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts>


     
