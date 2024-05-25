<x-layouts>
    {{-- <div class="container py-md-5 container--narrow">
        <form  style="width: 40%" action="/reclamer" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="post-title" class="text-muted mb-1"><strong>titre</strong></label>
            <input required name="titre" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
          </div>
          <div class="form-group">
            <label for="post-titre" class="text-muted mb-1"><small>attachement</small></label>
            <input required name="attachement" id="post-titre" class="form " type="file" placeholder="" autocomplete="off" />
          </div>
          
  
          <div class="form-group">
            <label for="post-body" class="text-muted mb-1"><small>votre reclamation avec dettails</small></label>
            <textarea required name="description" id="post-body" class="body-content tall-textarea form-control" type="text"></textarea>
          </div>
  
          <button class="btn btn-primary">envoyer</button>
        </form>
      </div>--}}
      <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Saisir votre réclamation</h3>
                    </div>
                    <div class="card-body">
                        <form action="/reclamer" method="POST" enctype="multipart/form-data">
                            @csrf
    
                            <!-- Title Input -->
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" id="titre" value="{{ old('titre') }}" required>
                                @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <!-- Description Textarea -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="5" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <!-- Attachment Input -->
                            <div class="form-group">
                                <label for="attachement">Attachement</label>
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
                                <a href="/home/{{ auth()->user()->username}}" class="btn btn-secondary">Annuler</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </div> 
     {{-- other template --}}
     
</x-layouts>
