<x-layouts>
  <div class="register-container">
    <div class="col-lg-5 register-card">
      <h2 class="form-title">Register</h2>
      <form action="/register" method="post" id="registration-form">
        @csrf
        <div class="form-group">
          <label for="username-register" class="text-muted mb-1"><boold>Username</boold></label>
          <input name="username" id="username-register" class="form-control" type="text" placeholder="Pick a username" autocomplete="off" />
        </div>
        <div class="form-group">
          <label for="telephone-register" class="text-muted mb-1"><boold>Telephone</boold></label>
          <input name="telephone" id="telephone-register" class="form-control" type="text" placeholder="Enter your telephone number" autocomplete="off" />
        </div>
        <div class="form-group">
          <label for="email-register" class="text-muted mb-1"><boold>Email</boold></label>
          <input name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" />
        </div>
        <div class="form-group">
          <label for="inputStatus" class="text-muted mb-1"><boold>Type</boold></label>
          <select name="type" id="inputStatus" class="form-control custom-select">
            <option selected>client</option>
            <option>admin</option>
            <option>technicien</option>
            <option>engineer</option>
          </select>
        </div>
        <div class="form-group">
          <label for="password-register" class="text-muted mb-1"><boold>Password</boold></label>
          <input name="password" id="password-register" class="form-control" type="password" placeholder="Create a password" />
        </div>
        <div class="form-group">
          <label for="password-register-confirm" class="text-muted mb-1"><boold>Confirm Password</boold></label>
          <input name="password_confirmation" id="password-register-confirm" class="form-control" type="password" placeholder="Confirm password" />
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
      </form>
    </div>
  </div>

  
</div>
</x-layouts>

    