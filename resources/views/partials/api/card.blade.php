<img src="{{$pokemon->sprites->front_default}}" class="img-thumbnail" alt="...">

<div class="card-body">
    <h5 class="card-title">{{$pokemon->name}}</h5>

    <p class="card-text">Weight: {{$pokemon->weight}}</p>
    <p class="card-text">Height: {{$pokemon->height}}</p>
    <p class="card-text">Type: {{$pokemon->types[0]->type->name}}</p>
    <p class="card-text">HP: {{$pokemon->stats[0]->base_stat}}</p>
    <p class="card-text">Attack: {{$pokemon->stats[1]->base_stat}}</p>
    <p class="card-text">Defense: {{$pokemon->stats[2]->base_stat}}</p>
</div>

<div class="card-footer">
    <small class="text-muted">Pokemon ID: {{$pokemon->id}}</small>
</div>

