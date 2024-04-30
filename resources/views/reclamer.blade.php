<x-layouts>
    <div class="container py-md-5 container--narrow">
        <form   action="/reclamer" method="POST">
          @csrf
          <div class="form-group">
            <label for="post-title" class="text-muted mb-1"><small>titre</small></label>
            <input required name="titre" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
          </div>
          <div class="form-group">
            <label for="post-titre" class="text-muted mb-1"><small>attachement</small></label>
            <input required name="attachement" id="post-titre" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
          </div>
          
  
          <div class="form-group">
            <label for="post-body" class="text-muted mb-1"><small>votre reclamation avec dettails</small></label>
            <textarea required name="description" id="post-body" class="body-content tall-textarea form-control" type="text"></textarea>
          </div>
  
          <button class="btn btn-primary">envoyer</button>
        </form>
      </div>
    </div>
</x-layouts>