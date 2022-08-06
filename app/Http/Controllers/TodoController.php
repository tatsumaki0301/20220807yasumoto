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

    public function find()
    {
        return view('find',['input' => '']);
    }
    public function search(Request $request)
    {
        $todo = Todo::find($request->input);
        $param = [
            'todo' => $todo,
            'input' => $request->input
        ];
        return view('find',$param);
    }

    public function add()
    {
        return view('add');
    }
    public function create(TodolistRequest $request)
    {
        $form = $request->content;
        Todo::create($form);
        return redirect('/');
    }
    public function edit(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('edit', ['form' => $todo]);
    }
    public function update(TodolistRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::where('id',$request->id)->update($form);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('delete', ['form' => $todo]);
    }
    public function remove(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }
}
