<x-layouts>
    {{-- <div class="container mt-5">
        <h1 class="mb-4">Réclamations Assignées</h1>
        @if($reclamations->isEmpty())
            <p class="alert alert-info">Aucune réclamation ne vous est assignée</p>
        @else
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Date de Mise à Jour</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reclamations as $reclamation)
                        <tr>
                            <td>{{ $reclamation->id }}</td>
                            <td>{{ $reclamation->titre }}</td>
                            <td>{{ $reclamation->updated_at->format('d/m/Y') }}</td>
                            <td>{{ $reclamation->status }}</td>
                            <td class="text-center">
                                <a href="/Details/{{ $reclamation->id }}" class="btn btn-info btn-sm" title="Voir">
                                    <i class="fas fa-eye"></i>
                                </a>
                                
                                <form action="/delete/{{ $reclamation->id }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette réclamation?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div> --}}
    <div class="container mt-5">
        <h1 class="mb-4">Réclamations Assignées</h1>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if($reclamations->isEmpty())
            <p class="alert alert-info">Aucune réclamation ne vous est assignée</p>
        @else

            <table class="table table-bordered table-striped" id="ENTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Date de Mise à Jour</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reclamations as $reclamation)
                        <tr>
                            <td>{{ $reclamation->id }}</td>
                            <td>{{ $reclamation->titre }}</td>
                            <td>{{ $reclamation->updated_at->format('d/m/Y') }}</td>
                            <td>{{ $reclamation->status }}</td>
                            <td class="text-center">
                                <a href="/Details/{{ $reclamation->id }}" class="btn btn-info btn-sm" title="Voir">
                                    <i class="fas fa-eye"></i>
                                </a>
                                
                                {{-- <form action="/delete/{{ $reclamation->id }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette réclamation?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form> --}}
                                
                                <!-- Formulaire de rejet -->
                                <form action="/reject/{{ $reclamation->id }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir rejeter cette réclamation?');">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="rejetée">
                                    <button type="submit" class="btn btn-warning btn-sm" title="Rejeter">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
        $('#ENTable').DataTable({
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

   