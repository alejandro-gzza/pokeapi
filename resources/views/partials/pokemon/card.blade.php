    <img src="{{$pokemon->front_img}}" class="img-thumbnail" alt="...">
    <div class="card-body">

        @if ($route_name == 'pokemon.index')
        <a href="{{ route('pokemon.show', ['pokemon_id'=> $pokemon->id]) }}">
            <h5 class="card-title">{{$pokemon->name}}</h5>

        @else
        <h5 class="card-title">{{$pokemon->name}}</h5>
        @endif

        </a>
        <p class="card-text">Weight: {{$pokemon->weight}}</p>
        <p class="card-text">Height: {{$pokemon->height}}</p>
        <p class="card-text">Type: {{$pokemon->type}}</p>
        <p class="card-text">HP: {{$pokemon->hp}}</p>
        <p class="card-text">Attack: {{$pokemon->attack}}</p>
        <p class="card-text">Defense: {{$pokemon->defense}}</p>
    </div>
    <div class="card-footer">
        <small class="text-muted">Pokemon ID: {{$pokemon->pokemon_id}}</small>

    </div>

    @if ($route_name == 'users.show')
        <form action="{{route('users.pokemon.delete', [$user_id, $pokemon->pivot->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger btn-sm btn-block">Delete</button>
        </form>
    @endif

