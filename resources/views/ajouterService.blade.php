<x-layouts>
    <form action="/ajouter" method="POST">
        @csrf
        
        <div class="col-auto">
            <label class="visually-hidden" for="autoSizingInput">Service</label>
            <!-- Add the 'name' attribute to your input field -->
            <input type="text" name="titre" class="form-control" id="autoSizingInput" placeholder="Enter service name">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
</x-layouts>