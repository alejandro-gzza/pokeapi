
<label for="pokemon_id">Choose a pokemon:</label>

<select class="form-select" name="pokemon_id" id="pokemon_id">
    @foreach ($pokemon as $pokemon)
        <option value="{{$pokemon->id}}"> {{ $pokemon->name }} </option>
    @endforeach
</select>

<div class="row">
    <div class="col text-center py-4">
        <button type="submit" class="btn btn-danger btn-lg btn-block">Submit</button>
    </div>
</div>
