<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PFE | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  
  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
  <style>
    /* .bg-brown {
           background-color: #8B4513 !important;
       } */
       .hidden {
           display: none;
       }
   .register-container {
     display: flex;
     justify-content: center;
     align-items: center;
     min-height: 100vh;
     background-color: #f8f9fa;
   }
   .register-card {
     padding: 2rem;
     border-radius: 0.5rem;
     box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
     background-color: #fff;
   }
   .form-title {
     text-align: center;
     margin-bottom: 2rem;
   }
   .form-group small {
     display: block;
     margin-bottom: 0.5rem;
   }
 
   .brand-link {
     display: flex;
     align-items: center;
     justify-content: flex-start;
     padding: 0 10px;
   }
   .brand-image {
     height: auto;
     max-height: 50px; /* Adjust as needed */
     margin-right: 25px; /* Adjust spacing between logo and text */
   }
   .brand-text {
     text-align: right;
   }
 </style>
</head>
<body style="margin-top: 10px" class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @if(auth()->user()->type == 'client')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home/{{auth()->user()->username}}" class="nav-link"> Accueil</a>
      </li>
      @elseif(auth()->user()->type == 'technicien')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/TecPage" class="nav-link"> Accueil</a>
      </li>
      @elseif(auth()->user()->type == 'engineer')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/engineer/reclamations" class="nav-link"> Accueil</a>
      </li>
      @else
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin" class="nav-link"> Accueil</a>
      </li>
      @endif
      
    
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside style="position: fixed" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
      
        <img  src="{{ asset('dist/img/7Qba1f-LogoMakr.png')}}" alt="PFE Logo" class="brand-image" style="opacity: .8; max-width: auto; height: 100px;">
        <span style="width: 15px;color:rgb(46, 56, 65)" >..</span>
        <span  >Gestions des<br>reclamations</span>
        
      
   </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      {{-- <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if(auth()->user()->type == 'admin')
          <li class="nav-item">
            <a href="/admin" class="nav-link">

              <i class="fas fa-users"></i>
              <p> Utilisateurs</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/services" class="nav-link">

              <i class="fas fa-cogs"></i>
              <p>Services</p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="/home/{{ auth()->user()->username }}" class="nav-link">

              <i class="fas fa-tachometer-alt"></i>
              <p>tableau de bord</p>
            </a>
          </li>
          <li class="nav-item">
            @if (auth()->user()->type == 'engineer')
            <a href="/engineer/reclamations" class="nav-link">
              <i class="fas fa-list"></i>
              <p>Réclamations</p>
            </a>
            @elseif(auth()->user()->type == 'technicien')
            <a href="/TecPage" class="nav-link">
              <i class="fas fa-list"></i>
              <p>Réclamations</p>
            </a>
            @else
            <a href="/reclamList/{{ auth()->user()->username }}" class="nav-link">
              <i class="fas fa-list"></i>
              <p>Réclamations</p>
            </a>
            @endif
            
          </li>
          <li class="nav-item">
            <a href="/profile" class="nav-link">
              <i class="fas fa-user"></i>
              <p>Profil</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>déconnexion</p>
            </a>
          </li>
        </ul>
      </nav> --}}
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if(auth()->user()->type == 'admin')
            <li class="nav-item">
                <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    <p>Utilisateurs</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/services" class="nav-link {{ Request::is('services') ? 'active' : '' }}">
                    <i class="fas fa-cogs"></i>
                    <p>Services</p>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a href="/home/{{ auth()->user()->username }}" class="nav-link {{ Request::is('home/' . auth()->user()->username) ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <p>tableau de bord</p>
                </a>
            </li>
            <li class="nav-item">
                @if (auth()->user()->type == 'engineer')
                <a href="/engineer/reclamations" class="nav-link {{ Request::is('engineer/reclamations') ? 'active' : '' }}">
                    <i class="fas fa-list"></i>
                    <p>Réclamations</p>
                </a>
                @elseif(auth()->user()->type == 'technicien')
                <a href="/TecPage" class="nav-link {{ Request::is('TecPage') ? 'active' : '' }}">
                    <i class="fas fa-list"></i>
                    <p>Réclamations</p>
                </a>
                @else
                <a href="/reclamList/{{ auth()->user()->username }}" class="nav-link {{ Request::is('reclamList/' . auth()->user()->username) ? 'active' : '' }}">
                    <i class="fas fa-list"></i>
                    <p>Réclamations</p>
                </a>
                @endif
            </li>
            <li class="nav-item">
                <a href="/profile" class="nav-link {{ Request::is('profile') ? 'active' : '' }}">
                    <i class="fas fa-user"></i>
                    <p>Profil</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/logout" class="nav-link" id="logout-link">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>déconnexion</p>
                </a>
            </li>
        </ul>
    </nav>
    
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{ $slot }}
  </div> 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  $(document).ready(function() {
      $('#userTable').DataTable({
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
  });
</script>

  

<script>
  document.addEventListener('DOMContentLoaded', function () {
      const toggleButton = document.getElementById('toggleAddServiceForm');
      const formContainer = document.getElementById('addServiceForm');

      toggleButton.addEventListener('click', function () {
          formContainer.classList.toggle('hidden');
      });
  });
</script>
<script>
  document.getElementById('logout-link').addEventListener('click', function(event) {
      event.preventDefault(); // Prevent the default action (navigation)
      if (confirm('Êtes-vous sûr de vouloir vous déconnecter?')) {
          window.location.href = this.href; // If the user confirms, proceed with the logout
      }
  });
  </script>

</body>
</html>








   