@if($errors->has($element))
    <span class="text-danger">{{$errors->first($element)}}</span>
@endif
