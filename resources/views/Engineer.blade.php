<x-layouts>
    <div class="container">
        <h1>Assigned Reclamations</h1>
        @if($reclamations->isEmpty())
            <p>No reclamations assigned to you.</p>
        @else
            
        @foreach($reclamations as $reclamation)
            <div class="list-group">
                <a href="/Details/{{$reclamation->id}}" class="list-group-item list-group-item-action">
                    <strong>{{ $reclamation->titre }} {{ $reclamation->id }}</strong> on {{ $reclamation->updated_at->format('n/j/y') }}
                </a>
            </div>
        @endforeach
                
        @endif
    </div>
</div>
</x-layouts>