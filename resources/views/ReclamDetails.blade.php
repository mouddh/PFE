<x-layouts>
    <div class="container py-md-5 container--narrow">
        <div class="d-flex justify-content-between">
          <h2>{{ $post->titre }}</h2>
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
      </div>
  
</div>
</x-layouts>