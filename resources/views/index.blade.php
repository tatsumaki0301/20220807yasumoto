@extends('layouts.default')
<style>
  .title-name{
    font-size: 25px;
    font-weight: bold;
  }
  .textbox{
    padding: 10px 5px;
    border-radius:5px;
    width: 300px;
    border: solid 1px lightgley;
  }
  .addbutton{
    padding: 5px 10px;
    background-color: white;
    color: magenta;
    border-color: magenta;
    border-radius: 5px;
  }
</style>

@section('title', 'COACHTECH')

@section('content')
@if (count($errors) > 0)
<ul>
  @foreach ($error->all() as $error)
  <li>
    {{$error}}
  </li>
  @endforeach
</ul>
@endif
<form action="/add" method="POST">
  @csrf
  <label class="title-name">Todo list<br>
  <input type="text" name="content" class="textbox">
  </label>
  <input type="button" name="addbutton" value="追加" class="addbutton">
  <table>
    <tr>
      <th>作成日</th>
      <th>タスク名</th>
      <th>更新</th>
      <th>削除</th>
    </tr>
  @foreach ($todos as $todo)
    <tr>
      <td>
        {{$todo->created_at}}
      </td>
      <td>
        <input type="text" name="content" value="{{$todo->content}}">
      </td>
      <td>
        <button>更新</button>
      </td>
      <td>
        <button>削除</button>
      </td>
    </tr>
  @endforeach
  </table>
</form>
@endsection