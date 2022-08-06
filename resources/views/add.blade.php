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
<form action="/add" method="post">
  @csrf
  <p>Todo list</p>
  <input type="text" name="content">
  <input type="button" name="addbutton" value="追加" class="addbutton">
  <table>
    @csrf
    <tr>
      <th>
        作成日
      </th>
      <td>
        <input type="hidden" name="created_at" value="{{$todo->created_at}}">
      </td>
    </tr>
    <tr>
      <th>
        タスク名
      </th>
      <td>
        <input type="text" name="content" value="{{content}}">
      </td>
    </tr>
    <tr>
      <th>
        更新
      </th>
      <td>
        <input type="button" name="edit" class="edit" value="更新">
      </td>
    </tr>
    <tr>
      <th>
        削除
      </th>
      <td>
        <input type="button" name="delete" class="delete" value="削除">
      </td>
    </tr>
  </table>
</form>
@endsection