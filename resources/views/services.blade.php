<x-layouts>
    <div style="width: 40%; margin:20px">
    
    <a href="/ajoutSer"><button  style="margin:20px" type="button" class="btn btn-primary">ajouter</button></a>  
    {{-- <ul  class="list-group">
      
      <li class="list-group-item active" aria-current="true">services</li>
      @foreach ($services as $service)
        <li class="list-group-item">{{ $service->titre}}
          <form style="margin-left: 70%" class="delete-post-form d-inline" action="/Details/{{$service}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
          </form></li> 
      @endforeach
      </ul> --}}
      <br>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">services</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($services as $service)
        <tr>
          <th scope="row">{{ $service->titre}}</th>
          <td><form style="margin-left: 70%" class="delete-post-form d-inline" action="/services/{{$service->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
          </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>

</div>
</x-layouts>
