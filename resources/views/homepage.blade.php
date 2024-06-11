<x-layouts>
  <div class="register-container">
    <div class="col-lg-5 register-card">
      <h2 class="form-title">Ajouter un utilisateur</h2> 
      <form action="/register" method="post" id="registration-form">
        @csrf
        <div class="form-group">
          <label for="username-register" class="text-muted mb-1"><strong>Nom d'utilisateur</strong></label> <!-- Translated "Username" to "Nom d'utilisateur" -->
          <input name="username" id="username-register" class="form-control" type="text" placeholder="Choisissez un nom d'utilisateur" autocomplete="off" />
        </div>
        <div class="form-group">
          <label for="telephone-register" class="text-muted mb-1"><strong>Téléphone</strong></label> <!-- Translated "Telephone" to "Téléphone" -->
          <input name="telephone" id="telephone-register" class="form-control" type="text" placeholder="Entrez votre numéro de téléphone" autocomplete="off" />
        </div>
        <div class="form-group">
          <label for="email-register" class="text-muted mb-1"><strong>Email</strong></label> <!-- Translated "Email" to "Email" -->
          <input name="email" id="email-register" class="form-control" type="text" placeholder="vous@example.com" autocomplete="off" />
        </div>
        <div class="form-group">
          <label for="inputStatus" class="text-muted mb-1"><strong>Type</strong></label> <!-- Translated "Type" to "Type" -->
          <select name="type" id="inputStatus" class="form-control custom-select">
            <option selected>client</option>
            <option>admin</option>
            <option>technicien</option>
            <option>engineer</option>
          </select>
        </div>
        <div class="form-group">
          <label for="password-register" class="text-muted mb-1"><strong>Mot de passe</strong></label> <!-- Translated "Password" to "Mot de passe" -->
          <input name="password" id="password-register" class="form-control" type="password" placeholder="Créer un mot de passe" />
        </div>
        <div class="form-group">
          <label for="password-register-confirm" class="text-muted mb-1"><strong>Confirmer le mot de passe</strong></label> <!-- Translated "Confirm Password" to "Confirmer le mot de passe" -->
          <input name="password_confirmation" id="password-register-confirm" class="form-control" type="password" placeholder="Confirmer le mot de passe" />
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Ajouter</button> <!-- Translated "Register" to "Inscription" -->
        <a href="/admin" class="btn btn-secondary btn-lg btn-block mt-2">Annuler</a> <!-- Added cancel button -->
      </form>
    </div>
  </div>


  
</div>
</x-layouts>

    