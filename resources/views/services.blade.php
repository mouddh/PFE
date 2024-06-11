<x-layouts>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    {{-- <div style="width: 40%; margin:20px">
    
    <a href="/ajoutSer"><button  style="margin:20px" type="button" class="btn btn-primary">ajouter</button></a>  
    
      <br>
    </div> --}}
    {{-- <table class="table">
      <thead>
        <tr>
          <th scope="col">services</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($services as $service)
        <tr>
          <th scope="row">{{ $service->titre}}</th>
          <td><form style="margin-left: 70%" class="delete-post-form d-inline" action="/services/{{$service->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
          </form></td>
        </tr>
        @endforeach
      </tbody>
    </table> --}}
    <div class="container mt-5" style="width: 60%;">
        <button id="toggleAddServiceForm" type="button" class="btn btn-primary mb-4">
            <i class="fas fa-plus"></i> Ajouter un service
        </button>
        
        <!-- Add Service Form -->
        <div  id="addServiceForm" class="card p-4 hidden">
            <form action="/ajouter" method="POST">
                @csrf
                <div class="form-group">
                    <label for="titre">Titre du service</label>
                    <input type="text" class="form-control" id="titre" name="titre" required>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Enregistrer
                </button>
            </form>
        </div>
        
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Services</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                <tr>
                    <td>{{ $service->titre }}</td>
                    <td class="text-center">
                        <form class="d-inline" action="/services/{{ $service->id }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette services ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Supprimer" >
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <a href="/services/{{ $service->id }}/edit" class="btn btn-warning ml-2" data-toggle="tooltip" data-placement="top" title="Mettre à jour" >
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

</x-layouts>
