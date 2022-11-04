@props(['label', 'name', 'id', 'status'])
<div class="todo-item">
    <div class="form-check">
        <input class="form-check-input todo" type="checkbox" value="{{ $id }}" data-id="{{ $id }}" {{ $status === "complete" ? "checked" : "" }} >
        <label class="form-check-label" for="defaultCheck1" style="text-decoration: {{ $status === "complete" ? "line-through" : "none" }};" >
            {{ $label }}
        </label>
    </div>
    <form method="POST" onclick="return confirm('Are you sure want to delete this?')" action="{{ route('todos.destroy', ['todo' => $id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-btn" {{ $attributes  }}>x</button>
    </form>
</div>
