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


    public function edit(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('index');
        
    }

    public function update(TodolistRequest $request)
    {
        $form = $request->all();
        Todo::where('id', $request->id)->update($form);
        return redirect('/');
    }

}



