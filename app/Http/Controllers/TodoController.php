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
    public function index(Request $request)
    {
        $user = Auth::user();
        $tags = Tag::all();
        $todos = Todo::all();
        $todos = Todo::paginate(5);
        $todo = Todo::with('tag')->where('id', $tags && 'tag_id', $todos)->get();


        $param = [
            'todos' => $todos,
            'user' => $user,
            'tags' => $tags,
            'todo' => $todo
        ];
        return view('index', $param);
    }


    public function create(TodolistRequest $request)
    {
        $id = Auth::id();
        $tags = Tag::all();
        $todos = Todo::all();

        $form = [
            'content' => $request->content,
            'tag_id' => $request->tag_id,
            'user_id' => $id,
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
        $todo = Todo::find($request->id);
        Todo::find($request->deleteid)->delete();
        return redirect('/home');
    }

    public function find()
    {
        $user = Auth::user();
        $tags = Tag::all();
        $todos = Todo::all();
        $todos = Todo::paginate(5);

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
        $tagname = $_POST['tag_id'];
        $todos = Todo::all();

        $query = Todo::query();
            if ($request->tag_id){
                $query->where('tag_id', $request->tag_id);
            }
            if ($request->input){
                $query->where('content', 'LIKE BINARY', "%{$request->input}%");
            }

            $todo = $query->get();

                $param = [
                    'todo' => $todo,
                    'user' => $user,
                    'tags' => $tags,
                    'todos' => $todos,
                    'tagname' => $tagname,
                    'input' => $request->input
                    
                ];

                return view('find', $param);

    }
}