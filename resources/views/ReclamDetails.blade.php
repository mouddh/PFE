<x-layouts>
      
    
    <div class="container py-md-5 container--narrow">
        <div class="d-flex justify-content-between">
          @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
          @endif
          <h2>{{ $post->titre }}</h2>
          @can('client_update_reclamation',$post)
              @if ($post->status == 'envoyer' )
              <span class="pt-2">
                <a href="/Details/{{$post->id}}/edit" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                <form class="delete-post-form d-inline" action="/Details/{{$post->id}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                </form>
              </span>
              @endif
          @endcan
          @can('update', $post)
          <span class="pt-2">
            <a href="/Details/{{$post->id}}/edit" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
            <form class="delete-post-form d-inline" action="/Details/{{$post->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
            </form>
          </span>
          @endcan
        </div>
  
        <p class="text-muted small mb-4">
          Posted by <a href="#">{{ $post->user->username }}</a> on {{ $post->updated_at->format('n/j/y')}}
        </p>
  
        <div class="body-content">
            <p>{!! $post->description !!}</p>
        </div>
        <div style="float: left" class="body-content">
          <img  style="width: 40%" src="{{ asset('storage/' . $post->attachement) }}" class="img-thumbnail" alt="Attachement">

        
        </div>
      
        @can('view',$post)
        <form style="float: right" method="POST" action="/changeStatus/{{$post->id}}">
          @csrf
          @method('PUT')
          <fieldset >
            
            <div  class="mb-3">
              <label for="Select" class="form-label">changer le status</label>
              <select name="status" id="status" class="form-control">
                <option value="envoyer" {{ $post->status == 'envoyer' ? 'selected' : '' }}>envoyer</option>
                <option value="recus" {{ $post->status == 'recus' ? 'selected' : '' }}>recus</option>
                <option value="transmis" {{ $post->status == 'transmis' ? 'selected' : '' }}>transmis</option>
                <option value="traitee" {{ $post->status == 'traitee' ? 'selected' : '' }}>traitee</option>
            </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </fieldset>
        </form>
        <div class="container">
           <form s action=" /reclamation/{{$post->id}}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                  <label for="engineer">Select Engineer:</label>
                  <select name="engineer_id" id="engineer" class="form-control" required>
                      <option value="">Select an engineer</option>
                      @foreach($engineers as $engineer)
                          <option value="{{ $engineer->id }}">{{ $engineer->username }}</option>
                      
                          @endforeach
                  </select>
              </div>
              <input type="hidden" name="status" value="transmis">
              <button type="submit" class="btn btn-primary">Assign</button>
          </form>
      
        @endcan
        @can('viewAny',$post)
        <form style="float: right" method="POST" action="/changeStatus/{{$post->id}}">
          @csrf
          @method('PUT')
          <fieldset >
            
            <div  class="mb-3">
              <label for="Select" class="form-label">changer le status</label>
              <select name="status" id="status" class="form-control">
                <option value="transmis" {{ $post->status == 'transmis' ? 'selected' : '' }}>transmis</option>
                <option value="traitee" {{ $post->status == 'traitee' ? 'selected' : '' }}>traitee</option>
            </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </fieldset>
        </form>
        @endcan
      </div>
    </div>
</div>
</x-layouts>