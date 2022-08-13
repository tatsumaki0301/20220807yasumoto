<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodolistRequest;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index', ['todos' => $todos]);
    }


    public function create(TodolistRequest $request)
    {
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }


    public function update(TodolistRequest $request)
    {
        $form = $request->all();
        Todo::find($request->id);
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function remove(Request $request)
    {
        $todo = todo::find($request->id);
        Todo::find($request->deleteid)->delete();
        return redirect('/');
    }

}



