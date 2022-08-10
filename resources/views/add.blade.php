@extends('layouts.default')

@section('title', 'COACHTECH')

@section('content')
  @if (count($errors) > 0)
  <ul>
    @foreach ($errors->all() as $error)
    <li>
      {{$error}}
    </li>
    @endforeach
  </ul>
  @endif
  <form action="/" method="POST">
    @csrf
    <p>{{created_at}}</p>
    <input type="text" value="{{$todo->content}}">
  </form>
    @endsection