<x-layouts>
    <div class="container py-md-5 container--narrow">
        <form   action="/Details/{{$post->id}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="post-title" class="text-muted mb-1"><small>titre</small></label>
            <input required value="{{old('titre',$post->titre)}}" name="titre" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
          </div>
          <div class="form-group">
            <label for="post-titre" class="text-muted mb-1"><small>attachement</small></label>
            <input required  value="{{old('attachement',$post->attachement)}}" name="attachement" id="post-titre" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
          </div>
          
  
          <div class="form-group">
            <label for="post-body" class="text-muted mb-1"><small>votre reclamation avec dettails</small></label>
            <textarea required name="description" id="post-body" class="body-content tall-textarea form-control" type="text">{{Old('description',$post->description)}}</textarea>
          </div>
  
          <button class="btn btn-primary">enregistrer</button>
        </form>
      </div>
    </div>
</x-layouts>