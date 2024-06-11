<x-layouts>

    
      


      <div class="container py-md-5 container--narrow">
        <h1>Les reclamations</h1>
        <div class="profile-nav nav nav-tabs pt-2 mb-4">
          <a href="#" class="profile-nav-link nav-item nav-link active">Reclamations: {{ $postCount }}</a>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (auth()->user()->type == 'client')
        <div class="table-responsive">
          <table class="table table-striped" id="Table">
            <thead>
              <tr>
                
                <th scope="col">Titre</th>
                <th scope="col">Date de Mise à Jour</th>
                <th scope="col">Statut</th>
                <th scope="col">actions</th>
              </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
              <tr>
                <td><a href="/Details/{{$post->id}}">{{ $post->titre }}</a></td>
                <td>{{ $post->updated_at->format('n/j/y') }}</td>
                <td>
                  @if ($post->status == 'envoyer')
                  <span class="badge badge-primary">{{ $post->status }}</span>
                  @elseif($post->status == 'recus')
                  <span class="badge badge-secondary">{{ $post->status }}</span>
                  @elseif($post->status == 'transmis')
                  <span class="badge badge-warning">{{ $post->status }}</span>
                  @elseif($post->status == 'traitee')
                  <span class="badge badge-success">{{ $post->status }}</span>
                  @else
                  <span class="badge badge-danger">{{ $post->status }}</span>
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
        @else
        <div class="table-responsive">
          <table class="table table-striped" id="Table">
            <thead>
              <tr>
                
                <th scope="col">Titre</th>
                <th scope="col">Date de Mise à Jour</th>
                <th scope="col">Statut</th>
                <th scope="col">actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($reclamations as $reclamation)
              <tr>
                <td><a href="/Details/{{$reclamation->id}}">{{ $reclamation->titre }}</a></td>
                <td>{{ $reclamation->updated_at->format('n/j/y') }}</td>
                <td>
                  @if ($reclamation->status == 'envoyer')
                  <span class="badge badge-primary">{{ $reclamation->status }}</span>
                  @elseif($reclamation->status == 'recus')
                  <span class="badge badge-secondary">{{ $reclamation->status }}</span>
                  @elseif($reclamation->status == 'transmis')
                  <span class="badge badge-warning">{{ $reclamation->status }}</span>
                  @elseif($reclamation->status == 'rejetée')
                  <span class="badge badge-danger">{{ $reclamation->status }}</span>
                  @else
                  <span class="badge badge-success">{{ $reclamation->status }}</span>
                  @endif
                </td>
                <td>
                
                
                <a href="/Details/{{$reclamation->id}}" class="btn btn-sm btn-primary" title="View"><i class="fas fa-eye"></i></a>

                  
                    
                      {{-- <a href="/Details/{{$reclamation->id}}/edit" class="btn btn-sm btn-warning" title="Update"><i class="fas fa-edit"></i></a> --}}
                      <form action="/Details/{{$reclamation->id}}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette réclamation ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
                      </form>
                     
                      
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
        
      </div>
</div>
</x-layouts>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<!-- Initialize DataTables -->
<script>
    $(document).ready( function () {
        $('#Table').DataTable({
          "language": {
                "decimal": "",
                "emptyTable": "Aucune donnée disponible dans le tableau",
                "info": "Affichage de _START_ à _END_ de _TOTAL_ entrées",
                "infoEmpty": "Affichage de 0 à 0 de 0 entrées",
                "infoFiltered": "(filtré à partir de _MAX_ entrées totales)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Afficher _MENU_ entrées",
                "loadingRecords": "Chargement...",
                "processing": "Traitement...",
                "search": "Rechercher:",
                "zeroRecords": "Aucun enregistrement correspondant trouvé",
                "paginate": {
                    "first": "Premier",
                    "last": "Dernier",
                    "next": "Suivant",
                    "previous": "Précédent"
                },
                "aria": {
                    "sortAscending": ": activer pour trier la colonne par ordre croissant",
                    "sortDescending": ": activer pour trier la colonne par ordre décroissant"
                }
            }
        });
    } );
</script>