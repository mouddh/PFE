<x-layouts>
  <section class="content">
    <!-- Projects Detail Card -->
    <div class="card mt-5 shadow-lg border-0">
        <div class="card-header bg-dark text-white">
            <h3 class="card-title">Détails des Projets</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Statistiques des réclamations -->
                <div class="col-12 col-md-12 col-lg-8">
                    <div class="row d-flex align-items-stretch">
                        <!-- Réclamations Envoyées -->
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="card text-center shadow-sm border-0 h-100">
                                <div class="card-body bg-primary text-white rounded">
                                    <h5 class="card-title">Réclamations Envoyées</h5>
                                    <p class="card-text display-4">{{ $postCount }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Réclamations Transmises -->
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="card text-center shadow-sm border-0 h-100">
                                <div class="card-body bg-warning text-white rounded">
                                    <h5 class="card-title">Réclamations Transmises</h5>
                                    <p class="card-text display-4">{{ $transmisCount }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Réclamations Traitées -->
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="card text-center shadow-sm border-0 h-100">
                                <div class="card-body bg-success text-white rounded">
                                    <h5 class="card-title">Réclamations Traitées</h5>
                                    <p class="card-text display-4">{{ $traiteeCount }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Boutons d'action -->
                <div class="col-12 col-md-12 col-lg-4 d-flex flex-column justify-content-center">
                    <div class="text-center">
                        <a href="/reclamer" class="btn btn-primary btn-lg mb-3 w-100">Ajouter une Réclamation</a>
                        <a href="/reclamList/{{ auth()->user()->username }}" class="btn btn-secondary btn-lg w-100">Vos réclamations</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>

<style>
  .card-header.bg-primary {
      background-color: #007bff;
  }
  .card {
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  }
  .form-control, .form-control-file {
      border-radius: 0.5rem;
  }
  .btn {
      margin-right: 10px;
  }
</style>



</div>
</x-layouts>