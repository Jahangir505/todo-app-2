<x-layout.master>

    <x-slot:title>Todo list</x-slot:title>

    <div class="">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>To Do List</h2>
        <div class="category-top">
            <p>Show category:</p>
            
            <ul>
                @foreach ($categories as $item)
                    <li style="cursor: pointer; color: {{ @$category_id === @$item->id ? "#000000" : "blue" }}"><a href={{ url('/todos?id=' . $item->id) }} style="color: {{ @$category_id === @$item->id ? "#000000" : "blue" }}">{{ $item->title }}</a></li>
                @endforeach
                <li style="color: {{ @$type === 'all' ? '#000000' : 'blue' }}; cursor: pointer;"><a href={{ url('/todos?type=all') }}>All</a></li>
            </ul>
        </div>
        <div class="todo-list">
            @foreach ($todo_list as $item)
                <x-todo.listItem label="{{ $item->title }}" id="{{ $item->id }}" status="{{ $item->status }}" class="todo" name="title"   />
            @endforeach
        </div>
        <hr class="h_r" />
        <h3></h3>
        <form method="POST" action="{{ route('todos.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <x-utilities.form.input
                        name="title"
                        placeholder="Enter your todo name"
                        label="Add TO DO"
                        labelFor="title"
                        id="title"
                        type="text"
                        value="{{ old('title') }}"
                    />
                </div>
                <div class="col-md-8 mt-3">
                    <label for="category">Category</label>
                    <select name="category_id" id="category">
                        <option value="">Choose Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mt-3">
                    <button class="btn">Add TODO</button>
                </div>
            </div>
        </form>
        <hr class="h_r" />
        <h2>CATEGORIES</h2>
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <x-utilities.form.input name="title" placeholder="Enter your Category name" label="Add Category" labelFor="title"  id="title" type="text" value="{{ old('title') }}" />
                </div>
                <div class="col-md-5 mt-4">
                    <button class="btn">Add Category</button>
                </div>
            </div>
        </form>
        <div class="categories">
            @foreach ($categories as $item)
                <x-todo.category title="{{ $item->title }}" id="{{ $item->id }}" />
            @endforeach
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(".todo").click(function() {
            // alert();
            const id = $(this).data("id");
            $.ajax(
                {
                    url: "todos/update-status/" + id,
                    type: 'POST',
                    data: {
                        'id': id,
                        '_token': $('meta[name=csrf-token]').attr("content"),
                    },
                    success: function () {
                        console.log("it Works");
                    }
                })
        });
    </script>
</x-layout.master>


