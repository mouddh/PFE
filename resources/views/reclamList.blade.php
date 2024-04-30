<x-layouts>
    <a  href="/reclamer"><button type="button" class="btn btn-primary btn-lg">ajouter un reclamation</button></a>

    <table class="table table-hover text-nowrap">
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
      </table>
</div>
</x-layouts>