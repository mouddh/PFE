<x-layouts>
      
  @if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif
  <div class="container py-md-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
          <a  onclick="window.history.back();" class="btn btn-secondary me-3">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
          
        </div>
        <div class="card-body">
           <strong><h2 class="card-title mb-0">{{ $post->titre }}</h2></strong>
           <br> 
            <p class="text-muted small mb-4">
                Posté par <a href="#">{{ $post->user->username }}</a> le {{ $post->updated_at->format('d/m/Y') }}
            </p>
            <div class="body-content mb-4">
                <p>{!! $post->description !!}</p>
            </div>
            <div class="mb-4">
                @php
                  $extension = pathinfo($post->attachement, PATHINFO_EXTENSION);
                @endphp
              
                @if($extension == 'pdf')
                  <embed src="{{ asset('storage/' . $post->attachement) }}" type="application/pdf" width="100%" height="500px" />
                @else
                  <img src="{{ asset('storage/' . $post->attachement) }}" class="img-thumbnail" alt="Attachement">
                @endif
            </div>
            {{-- <div class="mb-4">
                <img src="{{ asset('storage/' . $post->attachement) }}" class="img-thumbnail" alt="Attachement">
            </div> --}}
              @can('view', $post)
              <div style="display: flex">
                  <form style="float: left" class="mb-4" method="POST" action="/changeStatus/{{$post->id}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="recus">
                    <button type="submit" class="btn btn-secondary">Changer le statut à Reçus</button>
                </form>
                <form style="float: right; margin-left:50%" method="POST" action="/reclamation/{{$post->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="engineer">Sélectionner un ingénieur :</label>
                        <select name="engineer_id" id="engineer" class="form-control" required>
                            <option value="">Sélectionner un ingénieur</option>
                            @foreach($engineers as $engineer)
                                <option value="{{ $engineer->id }}">{{ $engineer->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="status" value="transmis">
                    <button type="submit" class="btn btn-primary">Assigner</button>
                </form>
            </div>
            @endcan
            @can('viewAny', $post)
                <form  class="mt-4" method="POST" action="/changeStatus/{{$post->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="status" class="form-label">Changer le statut</label>
                        <select name="status" id="status" class="form-control">
                            <option value="transmis" {{ $post->status == 'transmis' ? 'selected' : '' }}>transmis</option>
                            <option value="traitee" {{ $post->status == 'traitee' ? 'selected' : '' }}>traitee</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </form>
            @endcan
        </div>
    </div>
</div>

</div>
</x-layouts>