<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\StoreRequest;
use App\Http\Requests\Todo\UpdateRequest;
use App\Models\Category;
use App\Models\Todo;
use Exception;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category_id = (int)$request->input('id');
        $type = $request->input('type');
        $categories = Category::orderBy('title')->get();
        if($category_id > 0){
            $todo_list = Todo::where('category_id', '=', $category_id)->get();
        }else{
            $todo_list = Todo::all();
        }

        return view('todo.todo-list', compact('categories', 'todo_list', 'category_id', 'type'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try{
            Todo::create($request->all());
            return redirect()->route('todos.index')->with('status', 'Todo Create Successfully');
        }catch(Exception $e) {
            return redirect()->route('todos.index')->with('status', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
    }


    public function updateStatus($id) {
        try{
            
            $todo = Todo::find($id);
            $todo->status = "complete";
            $todo->save();

            return redirect()->route('todos.index')->with('status', 'Todo Status update successfully!');
        } catch(Exception $e) {
            return redirect()->route('todos.index')->with('status', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment\Todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        try{
            $todo->delete();
            return redirect()->route('todos.index')->with('status', 'Todo delete succesfully');
        }catch(Exception $e) {
            return redirect()->route('todos.index')->with('status', $e->getMessage());
        }
    }
}
