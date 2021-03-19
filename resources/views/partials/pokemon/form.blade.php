<div class="row">
<div class="col-md-4">
    <label for="pokemon_id" class="form-label">Pokemon ID</label>
    <input type="number" class="form-control" id="pokemon_id" name="pokemon_id"
    value="{{($edit) ? $pokemon->pokemon_id : old('pokemon_id')}}">
    @include('partials.form_errors', ['element'=>'pokemon_id'])
  </div>
  <div class="col-md-8">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name"
    value="{{($edit) ? $pokemon->name : old('name')}}">
    @include('partials.form_errors', ['element'=>'name'])
  </div>
  <div class="col-12">
    <label for="front_img" class="form-label">Front image</label>
    <input type="url" class="form-control" id="front_img" name="front_img"
    value="{{($edit) ? $pokemon->front_img : old('front_img')}}">
    @include('partials.form_errors', ['element'=>'front_img'])
  </div>
  <div class="col-12">
    <label for="back_img" class="form-label">Back image</label>
    <input type="url" class="form-control" id="back_img" name="back_img"
    value="{{($edit) ? $pokemon->back_img : old('back_img')}}">
    @include('partials.form_errors', ['element'=>'back_img'])
  </div>
  <div class="col-md-4">
    <label for="weight" class="form-label">Weight</label>
    <input type="number" class="form-control" id="weight" name="weight"
    value="{{($edit) ? $pokemon->weight : old('weight')}}">
    @include('partials.form_errors', ['element'=>'weight'])
  </div>
  <div class="col-md-4">
    <label for="height" class="form-label">Height</label>
    <input type="number" class="form-control" id="height" name="height"
    value="{{($edit) ? $pokemon->height : old('height')}}">
    @include('partials.form_errors', ['element'=>'height'])
  </div>
  <div class="col-md-4">
    <label for="type" class="form-label">Type</label>
    <input type="text" class="form-control" id="type" name="type"
    value="{{($edit) ? $pokemon->type : old('type')}}">
    @include('partials.form_errors', ['element'=>'type'])
  </div>
  <div class="col-md-4">
    <label for="hp" class="form-label">HP</label>
    <input type="number" class="form-control" id="hp" name="hp"
    value="{{($edit) ? $pokemon->hp : old('hp')}}">
    @include('partials.form_errors', ['element'=>'hp'])
  </div>
  <div class="col-md-4">
    <label for="attack" class="form-label">Attack</label>
    <input type="number" class="form-control" id="attack" name="attack"
    value="{{($edit) ? $pokemon->attack : old('attack')}}">
    @include('partials.form_errors', ['element'=>'attack'])
  </div>
  <div class="col-md-4">
    <label for="defense" class="form-label">Defense</label>
    <input type="number" class="form-control" id="defense" name="defense"
    value="{{($edit) ? $pokemon->defense : old('defense')}}">
    @include('partials.form_errors', ['element'=>'defense'])
  </div>
</div>

<div class="row">
    <div class="col text-center py-4">
        <button type="submit" class="btn btn-danger btn-lg btn-block">Submit</button>
    </div>
</div>
