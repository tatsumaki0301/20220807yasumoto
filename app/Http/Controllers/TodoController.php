<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\TodolistRequest;

class TodoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tags = Tag::all();
        $todos = Todo::all();
        $param = [
            'todos' => $todos,
            'user' => $user,
            'tags' => $tags
        ];
        return view('index', $param);
    }


    public function create(TodolistRequest $request)
    {
        $id = Auth::id();
        $form = [
            'content' => $request->content,
            'tag_id' => $request->tag_id,
            'user_id' => $id
        ];
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
        $user = Auth::user();
        $tags = Tag::all();
        $todos = Todo::all();
        $param = [
            'todos' => $todos,
            'user' => $user,
            'tags' => $tags,
        ];
        return view('find', ['input' => ''] , $param);
    }

    public function search(Request $request)
    {

        $user = Auth::user();
        $tags = Tag::all(); 
        $todos = Todo::all();
        $todo = Todo::where('content', $request->input)->get();
        $param = [
            'todo' => $todo,
            'user' => $user,
            'tags' => $tags,
            'input' => $request->input
        ];
        return view('find', $param);
    }
}