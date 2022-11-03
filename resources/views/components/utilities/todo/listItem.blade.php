@props(['label', 'name'])
<div class="todo-item">
    <div class="form-check">
    
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
            {{ $label }}
        </label>
    </div>
    <span>x</span>
</div>