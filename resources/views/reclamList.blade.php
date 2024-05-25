<x-layouts>

    
      


      <div class="container py-md-5 container--narrow">
        <h1>{{ $username }}</h1>
        <div class="profile-nav nav nav-tabs pt-2 mb-4">
          <a href="#" class="profile-nav-link nav-item nav-link active">Reclamations: {{ $postCount }}</a>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                
                <th scope="col">Titre</th>
                <th scope="col">Date de Mise à Jour</th>
                <th scope="col">Statut</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
              <tr>
                <td><a href="/Details/{{$post->id}}">{{ $post->titre }}</a></td>
                <td>{{ $post->updated_at->format('n/j/y') }}</td>
                <td>
                  @if ($post->status == 'envoyer')
                  <span class="badge badge-danger">{{ $post->status }}</span>
                  @elseif($post->status == 'recus')
                  <span class="badge badge-secondary">{{ $post->status }}</span>
                  @elseif($post->status == 'transmis')
                  <span class="badge badge-warning">{{ $post->status }}</span>
                  @else
                  <span class="badge badge-success">{{ $post->status }}</span>
                  @endif
                </td>
                <td>
                @can('client_update_reclamation',$post)
                
                <a href="/Details/{{$post->id}}" class="btn btn-sm btn-primary" title="View"><i class="fas fa-eye"></i></a>

                  @if ($post->status == 'envoyer' )
                    
                      <a href="/Details/{{$post->id}}/edit" class="btn btn-sm btn-warning" title="Update"><i class="fas fa-edit"></i></a>
                      <form action="/Details/{{$post->id}}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette réclamation ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
                      </form>
                      @endif
                      @endcan
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
</div>
</x-layouts>