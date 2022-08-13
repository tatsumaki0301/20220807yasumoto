@extends('layouts.default')
<style>
  .todolist_area{
    width: 60%;
    background-color: white;
    margin: 100px auto;
    border-radius: 10px;
  }
  .addarea{
    width: 90%;
    margin: 0px auto;
    padding: 20px 0px;
  }
  .title-name{
    font-size: 25px;
    font-weight: bold;
  }
  .textbox{
    padding: 10px 5px;
    border-radius:5px;
    width: 100%;
    border: solid 1px lightgrey;
  }
  .addbutton{
    padding: 10px 10px;
    background-color: white;
    color: magenta;
    border-color: magenta;
    border-radius: 5px;
  }
  .item_area{
    width: 90%;
    margin: -10px auto 0px;
  }
  table{
    width: 100%;
  }
  th ,td{
    text-align: center;
  }
    .contentbox{
    padding:5px;
    border-radius:5px;
    width: 100%;
    border-color: lightgray;
  }

  .editbutton{
    padding: 10px 10px;
    background-color: white;
    color: orangered;
    border-color: orangered;
    border-radius: 5px;
  }
  .deletebutton{
    padding: 10px 10px;
    background-color: white;
    color: lime;
    border-color: lime;
    border-radius: 5px;
  }
</style>

@section('title', 'COACHTECH')

@section('content')
  <div class="todolist_area">
    @if (count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
      <li>
        {{$error}}
      </li>
      @endforeach
    </ul>
    @endif
  <div class="addarea">
    <form action="/" method="post">
      @csrf
    <table>
        <label class="title-name">Todo list<br>
      <tr>
        <td>
        <input type="text" name="content" class="textbox">
        </label>
        </td>
        <td>
        <button class=addbutton>追加</button>
        </td>
      </tr>
    </form>
  </table>
  </div>

    <div class="item_area">
      <table>
        <tr>
          <th>作成日</th>
          <th></th>
          <th>タスク名</th>
          <th>更新</th>
          <th></th>
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
            <input type="hidden" name="id" value="{{$todo->id}}">
          </td>
          <td>
            <input type="text" name="content" class="contentbox" value="{{$todo->content}}">
          </td>
          <td>
            <button class=editbutton>更新</button>
          </td>
        </form>
        <form action="/remove" method="post">
          @csrf
          <td>
            <input type="hidden" name="deleteid" value="{{$todo->id}}">
          </td>
          <td>
            <button class=deletebutton>削除</button>
          </td>
        </form>
        </tr>
      @endforeach
      </table>
    </div>
  </div>
@endsection