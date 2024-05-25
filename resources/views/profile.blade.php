<x-layouts>
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <section style="display: flex" class="content">
            <div class="container-fluid">
              <div class="row">
                <!-- Information Card -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informations professionnelles</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="font-weight-bold">Nom d'utilisateur:</span>
                                    <span>{{ auth()->user()->username }}</span>
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">Adresse email:</span>
                                    <span>{{ auth()->user()->email }}</span>
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">Date d'inscription:</span>
                                    <span>{{ auth()->user()->created_at->format('d/m/Y') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
      
                <!-- Update Cards -->
                <div class="col-md-6">
                  <div class="row">
                    <!-- Telephone Update Section -->
                    <div class="col-md-12">
                      <div class="card card-secondary">
                        <div class="card-header">
                          <h3 class="card-title">Mettre à jour le téléphone</h3>
                        </div>
                        <!-- form start -->
                        <form action="{{ route('profile.update.telephone') }}" method="POST">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="telephone">Téléphone</label>
                              <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Entrez votre numéro de téléphone" value="{{ old('telephone', auth()->user()->telephone) }}">
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Mettre à jour le téléphone</button>
                          </div>
                        </form>
                      </div>
                    </div>
      
                    <!-- Password Update Section -->
                    <div class="col-md-12">
                      <div class="card card-secondary">
                        <div class="card-header">
                          <h3 class="card-title">Changer le mot de passe</h3>
                        </div>
                        <!-- form start -->
                        <form action="{{ route('profile.update.password') }}" method="POST">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="current_password">Mot de passe actuel</label>
                              <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Entrez votre mot de passe actuel">
                            </div>
                            <div class="form-group">
                              <label for="new_password">Nouveau mot de passe</label>
                              <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Entrez votre nouveau mot de passe">
                            </div>
                            <div class="form-group">
                              <label for="new_password_confirmation">Confirmez le nouveau mot de passe</label>
                              <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirmez votre nouveau mot de passe">
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-secondary">Changer le mot de passe</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
        </div>
        <!-- /.content-wrapper -->
      </div>
      <!-- ./wrapper -->
    </div>
</x-layouts>