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

}



