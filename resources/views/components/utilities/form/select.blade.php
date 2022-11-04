@props(['label', 'labelFor', 'name', 'dropdown_list', 'data' => null])

<div class="mb-3 mt-3">
    <label for="address" class="form-label">{{ $label }}</label>
    <select name="{{ $name }}" {{ $attributes->merge([
        'class' => "form-control"
    ]) }}>
        <option value="">Select</option>
        <option value="Virtual" {{$data === 'Virtual' ? 'selected' : ''}}>Virtual</option>
        <option value="Physical" {{$data === 'Physical' ? 'selected' : ''}}>Physical</option>
    </select>

</div>
