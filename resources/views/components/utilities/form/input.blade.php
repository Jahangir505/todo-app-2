@props(['label', 'labelFor', 'name'])

<div class=" mt-3">
    <label for="{{$labelFor}}" class="form-label">{{$label}}</label>
    <input  name="{{ $name }}" {{ $attributes->merge([
        'class' => "form-control"
    ]) }}>

</div>
