<x-layouts>
    <a  href="/reclamer"><button type="button" class="btn btn-primary btn-lg">ajouter un reclamation</button></a>

    {{-- <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>id</th>
            <th>titre</th>
            <th>description</th>
            <th>attachement</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reclamations as $reclamation)
          <tr>
              <td>{{ $reclamation->id }}</td>
              <td>{{ $reclamation->titre }}</td>
              <td>{{ $reclamation->description }}</td>
              <td>{{ $reclamation->attachement }}</td>
              
              <!-- Add more columns if needed -->
          </tr>
          @endforeach
      </tbody>
      </table> --}}
      <div class="container py-md-5 container--narrow">
        <h1> {{$username}}</h1>
  
        <div class="profile-nav nav nav-tabs pt-2 mb-4">
          <a href="#" class="profile-nav-link nav-item nav-link active">Posts: {{ $postCount }}</a>
        </div>
        {{-- <ul> --}}
          @foreach ($posts as $post)
          {{-- <li> --}}
            <div class="list-group">
              <a href="/Details/{{$post->id}}" class="list-group-item list-group-item-action">
                <strong>{{ $post->titre }} {{ $post->id }}</strong> on {{ $post->updated_at->format('n/j/y') }}
              </a>
              
            </div>
          {{-- </li> --}}
          @endforeach
        {{-- </ul> --}}
      </div>
</div>
</x-layouts>