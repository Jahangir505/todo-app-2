<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TodoList;
use Exception;
use Illuminate\Http\Request;

class TodoManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $categories = Category::orderBy('title')->get();
            $todo_list = TodoList::all();
           return view('todo.todo-list', compact('categories', 'todo_list'));
        }catch (Exception $e) {
            return $e->getMessage();
        }
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
    public function store(Request $request)
    {
        try{
            $request->validate([
                'title' => 'required | string | max:255',
                'cat_id' => 'required',
            ]);

            TodoList::create($request->all());

            return redirect()->route('todos.index')->with('alert', [
                'type' => 'success',
                'message' => 'Todo created successfully'
            ]);
        }catch(Exception $e) {
            return $e->getMessage();
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment\TodoList
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoList $todolist)
    {
        try{
            $todolist->delete();

            return redirect()->route('todos.index')->with('alert', [
                'type' => 'success',
                'message' => 'Todo deleted successfully'
            ]);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
