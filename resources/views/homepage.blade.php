<x-layouts>
    <div class="row align-items-center">
      <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
        <form action="register" method="Post" id="registration-form">
          @csrf
          <div class="form-group">
            <label for="username-register" class="text-muted mb-1"><small>Username</small></label>
            <input name="username" id="username-register" class="form-control" type="text" placeholder="Pick a username" autocomplete="off" />
          </div>
          <div class="form-group">
            <label for="telephone-register" class="text-muted mb-1"><small>telephone</small></label>
            <input name="telephone" id="telephone-register" class="form-control" type="text" placeholder="Pick a username" autocomplete="off" />
          </div>

          <div class="form-group">
            <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
            <input name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" />
          </div>
          <div class="form-group">
            <label for="password-register" class="text-muted mb-1"><small>Password</small></label>
            <input name="password" id="password-register" class="form-control" type="password" placeholder="Create a password" />
          </div>

          <div class="form-group">
            <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm Password</small></label>
            <input name="password" id="password-register-confirm" class="form-control" type="password" placeholder="Confirm password" />
          </div>
           {{-- <button  type="submit" class="py-3 mt-4 btn btn-lg btn-success btn-block">Sign up for OurApp</button>  --}}
            <button type="submit" class="btn btn-primary btn-lg">ajouter</button> 
         </form>
      </div>
    </div>
  </div>

  

</x-layouts>

    