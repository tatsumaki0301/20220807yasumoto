<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodolistRequest;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $user = auth::user();
        $todos = Todo::all();
        $param = ['todos' => $todos, 'user' => $user];
        return view('index', $param);
    }


    public function create(TodolistRequest $request)
    {
        $form = $request->all();
        Todo::create($form);
        return redirect('/home');
    }


    public function update(TodolistRequest $request)
    {
        $form = $request->all();
        Todo::find($request->id);
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/home');
    }

    public function remove(Request $request)
    {
        $todo = todo::find($request->id);
        Todo::find($request->deleteid)->delete();
        return redirect('/home');
    }

    public function find()
    {
        $user = auth::user();
        $todos = Todo::all();
        $param = ['todos' => $todos, 'user' => $user];
        return view('find', ['input' => ''], $param);
    }

    public function search(Request $request)
    {
        $todo = Todo::find($request->input);
        $param = [
            'todo' => $todo,
            'input' => $request->input
        ];
        return view('find', $param);
    }

}



