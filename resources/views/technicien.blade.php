<x-layouts>
  <div class="container py-md-5 container--narrow">
    <div class="profile-nav nav nav-tabs pt-2 mb-4">
      <a href="#" class="profile-nav-link nav-item nav-link active">Reclamations</a>
    </div>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            
            <th scope="col">Titre</th>
            <th scope="col">Date de Mise à Jour</th>
            <th scope="col">Statut</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reclamations as $reclamation)
          <tr>
            {{-- <th scope="row"><a href="/Details/{{$reclamation->id}}">{{ $reclamation->id }}</a></th> --}}
            <td><a href="/Details/{{$reclamation->id}}">{{ $reclamation->titre }}</a></td>
            <td>{{ $reclamation->updated_at->format('n/j/y') }}</td>
            <td>
              @if ($reclamation->status == 'envoyer')
              <span class="badge badge-danger">{{ $reclamation->status }}</span>
              @elseif($reclamation->status == 'recus')
              <span class="badge badge-secondary">{{ $reclamation->status }}</span>
              @elseif($reclamation->status == 'transmis')
              <span class="badge badge-warning">{{ $reclamation->status }}</span>
              @else
              <span class="badge badge-success">{{ $reclamation->status }}</span>
              @endif
            </td>
            <td>
              <a href="/Details/{{$reclamation->id}}" class="btn btn-sm btn-primary" title="View"><i class="fas fa-eye"></i></a>
              <a href="/Details/{{$reclamation->id}}/edit" class="btn btn-sm btn-warning" title="Update"><i class="fas fa-edit"></i></a>
              <form action="/Details/{{$reclamation->id}}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
              </form>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</x-layouts>