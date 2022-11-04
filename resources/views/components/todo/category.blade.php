@props(['label', 'title', 'name', 'id'])
<div class="category-item">
    <form method="POST" onclick="return confirm('Are you sure want to delete this?')" action="{{ route('categories.destroy', ['category' => $id]) }}">
        @csrf
        @method("DELETE")
        <button type="submit" class="delete-btn">x</button>
    </form>
    <h4>{{ $title }}</h4>
</div>