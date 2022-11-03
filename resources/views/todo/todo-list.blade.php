<x-layout.master>

    <x-slot:title>Todo list</x-slot:title>

    <div class="">
        <h2>To Do List</h2>
        <div class="category-top">
            <p>Show category:</p>

            <ul>
                @foreach ($categories as $item)
                    <li>{{ $item->title }}</li>
                @endforeach
                <li style="color: #000000">All</li>
            </ul>
        </div>
        <div class="todo-list">
            @foreach ($todo_list as $item)
                <x-utilities.todo.listItem label="{{ $item->title }}" name="Name"   />
            @endforeach
        </div>
        <hr class="h_r" />
        <h3></h3>
        <form method="POST" action="{{ route('todos.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <x-utilities.form.input name="title" placeholder="Enter your todo name" label="Add TO DO" labelFor="title"  id="title" type="text" value="{{ old('title') }}" />
                </div>
                <div class="col-md-8 mt-3">
                    <label for="category">Category</label>
                    <select name="cat_id" id="category">
                        <option value="">Choose Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mt-3">
                    <button class="btn btn-info">Add TODO</button>
                </div>
            </div>
        </form>
        <hr class="h_r" />
        <h2>CATEGORIES</h2>
        <form method="POST" action="{{ route('category.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <x-utilities.form.input name="title" placeholder="Enter your Category name" label="Add Category" labelFor="title"  id="title" type="text" value="{{ old('title') }}" />
                </div>
                <div class="col-md-5 mt-4">
                    <button class="btn btn-info">Add Category</button>
                </div>
            </div>
        </form>
        <div class="categories">
            @foreach ($categories as $item)
                <x-utilities.todo.category title="{{ $item->title }}" />
            @endforeach
        </div>
    </div>
</x-layout.master>
