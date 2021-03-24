<div class="row">
    <div class="col-md-4">
        <label for="pokemon_id" class="form-label">Pokemon ID</label>
        <input type="number" class="form-control" id="pokemon_id" name="pokemon_id"
        value="{{old('pokemon_id')}}">
        @include('partials.form_errors', ['element'=>'pokemon_id'])
    </div>
</div>
<div class="row">
    <div class="col text-center py-4">
        <button type="submit" class="btn btn-danger btn-lg btn-block">Submit</button>
    </div>
</div>

