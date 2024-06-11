<x-layouts>
    {{-- <div class="container py-md-5 container--narrow">
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
            <label for="post-body" class="text-muted mb-1"><small>votre$post avec dettails</small></label>
            <textarea required name="description" id="post-body" class="body-content tall-textarea form-control" type="text">{{Old('description',$post->description)}}</textarea>
          </div>
  
          <button class="btn btn-primary">enregistrer</button>
        </form>
      </div> --}}

      <div class="container centered-form">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Saisir votre réclamation</h3>
                    </div>
                    <div class="card-body">
                        <form action="/Details/{{$post->id}}" method="PUT" enctype="multipart/form-data">
                            @csrf
                          @method('PUT')
                            <!-- Title Input -->
                            <div class="form-group">
                                <label for="titre"><strong>Titre</strong></label>
                                <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" id="titre" value="{{ old('titre',$post->titre) }}"  required>
                                @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <!-- Description Textarea -->
                            <div class="form-group">
                                <label for="description"><strong>Description</strong></label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="5" required>{{ old('description', $post->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <!-- Attachment Input -->
                            <div class="form-group">
                                <label for="attachement"><strong>Attachement</strong></label>
                                <input type="file" name="attachement" class="form-control-file @error('attachement') is-invalid @enderror" id="attachement">
                                @error('attachement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-secondary" onclick="window.location.href='javascript:history.back()';">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    </div>
</x-layouts>