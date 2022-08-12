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
  .editbutton{
    padding: 5px 10px;
    background-color: white;
    color: orangered;
    border-color: orangered;
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

<form action="/" method="post">
  @csrf
    <label class="title-name">Todo list<br>
    <input type="text" name="content" class="textbox">
    </label>
    <button class=addbutton>追加</button>
</form>

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
    <form action="/update" method="post">
      @csrf
      <td>
        <input type="text" name="content" value="{{$todo->content}}">
      </td>
      <td>
        <button class=editbutton>更新</button>
      </td>
    </form>
      <td>
        <button class=deletebutton>削除</button>
      </td>
    </tr>
  @endforeach
  </table>
@endsection