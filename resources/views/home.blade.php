

{{-- <x-layouts>
    <section class="content">
      <!-- Projects Detail Card -->
      <div class="card mt-5 shadow-lg border-0">
        <div class="card-header bg-dark text-white">
          <h3 class="card-title">Détails des Projets</h3>
        </div>
  
        @if (auth()->user()->type == 'client' || auth()->user()->type == 'engineer')
        <div class="card-body">
          <div class="row">
            <!-- Statistiques des réclamations -->
            <div class="col-12">
              <div class="row d-flex align-items-stretch">
                <!-- Réclamations Envoyées -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-primary text-white rounded">
                      @if (auth()->user()->type == 'engineer')
                      <h5 class="card-title">Réclamations assignée pour vous</h5>
                      @else
                      <h5 class="card-title">Réclamations envoyer</h5>
                      @endif
                      <p class="card-text display-4">{{ $postCount }}</p>
                    </div>
                  </div>
                </div>
                <!-- Réclamations Transmises -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-warning text-white rounded">
                      <h5 class="card-title">Réclamations Transmises</h5>
                      <p class="card-text display-4">{{ $transmisCount }}</p>
                    </div>
                  </div>
                </div>
                <!-- Réclamations Traitées -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-success text-white rounded">
                      <h5 class="card-title">Réclamations Traitées</h5>
                      <p class="card-text display-4">{{ $traiteeCount }}</p>
                    </div>
                  </div>
                </div>
                <!-- Réclamations Rejetées -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-danger text-white rounded">
                      <h5 class="card-title">Réclamations rejetee</h5>
                      <p class="card-text display-4">{{ $rejeteeCount }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Boutons d'action -->
            <div class="col-12 d-flex justify-content-center">
              <div class="text-center">
                @if (auth()->user()->type == 'client')
                <a href="/reclamer" class="btn btn-primary btn-lg mb-3 w-100">Ajouter une Réclamation</a>
                @endif
                <a href="/reclamList/{{ auth()->user()->username }}" class="btn btn-secondary btn-lg w-100">Vos réclamations</a>
              </div>
            </div>
          </div>
        </div>
  
        @else
        <div class="card-body">
          <div class="row">
            <!-- Statistiques des réclamations -->
            <div class="col-12">
              <div class="row d-flex align-items-stretch">
                <!-- Réclamations Envoyées -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-primary text-white rounded">
                      <h5 class="card-title">Réclamations Envoyées</h5>
                      <p class="card-text display-4">{{ $Allenvoyer }}</p>
                    </div>
                  </div>
                </div>
                <!-- Réclamations Transmises -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-warning text-white rounded">
                      <h5 class="card-title">Réclamations Transmises</h5>
                      <p class="card-text display-4">{{ $Alltransmis }}</p>
                    </div>
                  </div>
                </div>
                <!-- Réclamations Traitées -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-success text-white rounded">
                      <h5 class="card-title">Réclamations Traitées</h5>
                      <p class="card-text display-4">{{ $Alltraitee }}</p>
                    </div>
                  </div>
                </div>
                <!-- Réclamations Rejetées -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-danger text-white rounded">
                      <h5 class="card-title">Réclamations rejetee</h5>
                      <p class="card-text display-4">{{ $Allrejetee }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Boutons d'action -->
            <div class="col-12 d-flex justify-content-center">
              <div class="text-center">
                {{-- <a href="/reclamer" class="btn btn-primary btn-lg mb-3 w-100">Ajouter une Réclamation</a> --}}
                {{-- <a href="/reclamList/{{ auth()->user()->username }}" class="btn btn-secondary btn-lg w-100">les réclamations</a>
              </div>
            </div>
          </div>
        </div>
        @endif
  
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
  
    <style>
      .card-header.bg-primary {
        background-color: #007bff;
      }
  
      .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
  
      .form-control,
      .form-control-file {
        border-radius: 0.5rem;
      }
  
      .btn {
        margin-right: 10px;
      }
    </style>
  </x-layouts>
   --}} 

   <x-layouts>
    <section class="content">
      <!-- Projects Detail Card -->
      <div class="card mt-5 shadow-lg border-0">
        <div class="card-header bg-dark text-white">
          <h3 class="card-title">Détails des Projets</h3>
        </div>
  
        @if (auth()->user()->type == 'client' || auth()->user()->type == 'engineer')
        <div class="card-body">
          <div class="row">
            <!-- Statistiques des réclamations -->
            <div class="col-12">
              <div class="row d-flex align-items-stretch">
                <!-- Réclamations Envoyées -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-primary text-white rounded">
                      @if (auth()->user()->type == 'engineer')
                      <h5 class="card-title">Réclamations assignée pour vous</h5>
                      @else
                      <h5 class="card-title">Réclamations envoyer</h5>
                      @endif
                      <p class="card-text display-4">{{ $postCount }}</p>
                    </div>
                  </div>
                </div>
                <!-- Réclamations Transmises -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-warning text-white rounded">
                      <h5 class="card-title">Réclamations Transmises</h5>
                      <p class="card-text display-4">{{ $transmisCount }}</p>
                    </div>
                  </div>
                </div>
                <!-- Réclamations Traitées -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-success text-white rounded">
                      <h5 class="card-title">Réclamations Traitées</h5>
                      <p class="card-text display-4">{{ $traiteeCount }}</p>
                    </div>
                  </div>
                </div>
                <!-- Réclamations Rejetées -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-danger text-white rounded">
                      <h5 class="card-title">Réclamations rejetee</h5>
                      <p class="card-text display-4">{{ $rejeteeCount }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Boutons d'action -->
            @if(auth()->user()->type == 'client')
              <div class="col-12 d-flex justify-content-center">
                <div class="text-center">
                  {{-- @if (auth()->user()->type == 'client') --}}
                  <a href="/reclamer" class="btn btn-primary btn-lg mb-3 w-100">Ajouter une Réclamation</a>
                  {{-- @endif --}}
                  <a href="/reclamList/{{ auth()->user()->username }}" class="btn btn-secondary btn-lg w-100">Vos réclamations</a>
                </div>
              </div>
            @endif
          </div>
        </div>
  
        @else
        <div class="card-body">
          <div class="row">
            <!-- Statistiques des réclamations -->
            <div class="col-12">
              <div class="row d-flex align-items-stretch">
                <!-- Réclamations Envoyées -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-primary text-white rounded">
                      <h5 class="card-title">Réclamations Envoyées</h5>
                      <p class="card-text display-4">{{ $Allenvoyer }}</p>
                    </div>
                  </div>
                </div>
                <!-- Réclamations Transmises -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-warning text-white rounded">
                      <h5 class="card-title">Réclamations Transmises</h5>
                      <p class="card-text display-4">{{ $Alltransmis }}</p>
                    </div>
                  </div>
                </div>
                <!-- Réclamations Traitées -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-success text-white rounded">
                      <h5 class="card-title">Réclamations Traitées</h5>
                      <p class="card-text display-4">{{ $Alltraitee }}</p>
                    </div>
                  </div>
                </div>
                <!-- Réclamations Rejetées -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                  <div class="card text-center shadow-sm border-0 h-100">
                    <div class="card-body bg-danger text-white rounded">
                      <h5 class="card-title">Réclamations rejetee</h5>
                      <p class="card-text display-4">{{ $Allrejetee }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Boutons d'action -->
            <div class="col-12 d-flex justify-content-center">
              <div class="text-center">
                  <a href="/reclamList/{{ auth()->user()->username }}" class="btn btn-secondary btn-lg w-100">les réclamations</a>
              </div>
            </div>
          </div>
        </div>
        @endif
  
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
  
  <!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@if(auth()->user()->type == 'admin')
<!-- Chart Canvas -->
<div class="card mt-5 shadow-lg border-0">
    <div class="card-header bg-dark text-white">
        <h3 class="card-title">Graphique des Réclamations</h3>
    </div>
    <div class="card-body">
        {{-- <canvas id="reclamationsChart"></canvas> --}}
        <canvas id="reclamationsChart" width="200" height="200"></canvas>

    </div>
</div>
@endif
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const ctx = document.getElementById('reclamationsChart').getContext('2d');
    const reclamationsData = @json($reclamationsData);

    const reclamationsChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Envoyées', 'Transmises', 'Traitée', 'Rejetée'],
            datasets: [{
                label: 'Réclamations',
                data: [
                    reclamationsData.envoyer,
                    reclamationsData.transmis,
                    reclamationsData.traitee,
                    reclamationsData.rejetee
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(255, 99, 132, 0.8)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
});
</script>
  </x-layouts>
  