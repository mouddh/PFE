<x-layouts>
  <div class="container py-md-5 container--narrow">
    <div class="profile-nav nav nav-tabs pt-2 mb-4">
      <a href="#" class="profile-nav-link nav-item nav-link active">Reclamations</a>
    </div>

    <div class="table-responsive">
      <table class="table table-striped" id="TECTable">
        <thead>
          <tr>
            
            <th scope="col">id</th>
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
            <td>{{ $reclamation->id }}</a></td>
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
              @if ($reclamation->status == 'envoyer' || $reclamation->status == 'recus' )
              <form action="/Details/{{$reclamation->id}}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
              </form>
              @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</x-layouts>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<!-- Initialize DataTables -->
<script>
    $(document).ready( function () {
        $('#TECTable').DataTable({
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