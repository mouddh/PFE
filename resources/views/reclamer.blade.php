<x-layouts>
    
      <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div style="background-color:rgb(61, 74, 86)" class="card-header">
                        <h3 style="color: aliceblue">Saisir votre réclamation</h3>
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
