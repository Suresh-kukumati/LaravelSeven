<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TodoCreateRequest;
use App\Todo;

class TodoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        //$todos = auth()->user()->todo()->orderBy('completed')->get();
        $todos = auth()->user()->todo->sortBy('completed');;
        //$todos = Todo::OrderBy('completed')->get();
        return view('todos.index',compact('todos'));
    }

    public function create() {
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request) {
        auth()->user()->todo()->create($request->all());
        // $request->validate([
        //     'title' => 'required|max:255',
        // ]);
        // $rule = [
        //     'title' => 'required|max:255'
        // ];
        // $message = [
        //     'title.max' => 'Todo title should not be grater than 255 chars'
        // ];

        // $validator = Validator::make($request->all(),$rule,$message);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        //Todo::create($request->all());
        return redirect(route('todo.index'))->with('message','Todo inserted successfully');
    }

    public function edit(Todo $todo) {
        //$todo = Todo::find($id);
        return view('todos.edit',compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo){
        //dd($request->all());
        $todo->update(['title' => $request->title]);
        return redirect(route('todo.index'))->with('message','Updated Successfully');
    }

    public function complete(Todo $todo){
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message','Task Marked as Completed');
    }

    public function inComplete(Todo $todo){
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message','Task Mark as incompleted');
    }

    public function destroy(Todo $todo){
        $todo->delete();
        return redirect()->back()->with('message','Task Deleted successfully !');
    }
}
