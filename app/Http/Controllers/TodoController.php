<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Todo;

class TodoController extends Controller {

/*
 * create a todo
 * input $request Request object
 * return redirect to home
 */

    public function create(Request $request){
        $title = $request->input('title');

        $todo = new Todo();
        $todo->title = $title;
        $todo->save();

        return redirect('/');
    }

    /*
     * update a todo
     * input $request Request Object -> expected: completed input field, id from url match
     * return redirect to home
     */

    public function update(Request $request, $id){
        $todo = Todo::findOrFail($id);

        $todoCompleted = $request->input('completed');

        $todo->completed = $todoCompleted;
        $todo->save();

        return redirect('/');
    }

    public function delete($id){
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect('/');
    }

    public function markAllAsCompleted(){
        Todo::where('completed', '=', 0)->update(array('completed' => 1));

        return redirect('/');
    }

    public function show(){
        $todos = Todo::all();
        $uncompletedCount = Todo::where('completed', '==', 0)->count();
        return view('todo', ['todos' => $todos, 'uncompletedCount' => $uncompletedCount]);
    }
}


?>
