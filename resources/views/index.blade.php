@extends('layouts.default')
<style>
  .todolist_area{
    width: 60%;
    background-color: white;
    margin: 100px auto;
    border-radius: 10px;
  }
  .title-name{
    font-size: 25px;
    font-weight: bold;
  }
  .username{
    text-align: right;
  }
  .logoutbutton{
    padding: 5px 10px;
    background-color: white;
    color: red;
    border-color: red;
    border-radius: 5px;
  }
  .searchlinkbutton{
    padding: 5px 10px;
    background-color: white;
    color: YellowGreen;
    border-color: YellowGreen;
    border-radius: 5px;
    margin-bottom: -20px;
  }
  .addarea{
    width: 90%;
    margin: 0px auto;
    padding: 20px 0px;
  }
  .tag_item{
    margin: 0px 10px;
    padding: 10px 5px;
    border-radius: 5px;
  }
  .textbox{
    padding: 10px 5px;
    border-radius:5px;
    width: 120%;
    border: solid 1px lightgrey;
    margin-right: 20px;
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
  svg.w-5.h-5 {
    height: 30px;
  }
</style>

@section('title', 'COACHTECH')

@section('content')
  <div class="todolist_area">
    <table>
      <td>
        <label class="title-name">Todo list  </label>
      </td>
      <td></td>
      <td>
        @if (Auth::check())
        <p class="username">{{'「' .$user->name . '」でログイン中'}}</p>
        @else
        <p>ログインしてください。（<a href="/login">ログイン</a>|
          <a href="/register">登録</a>）</p>
        @endif
      </td>
      <form action="{{route('logout')}}" method="POST">
        @csrf
        <td>
          <button class="logoutbutton">ログアウト</button>
        </td>
      </form>
    </table>

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
    <form action="/find" method="get">
      <button class="searchlinkbutton">タスク検索</button>
    </form>
    <form action="/home" method="post">
      @csrf
    <table>
      <tr>
        <td>
        <input type="text" name="content" class="textbox">
        </td>
        <td>
          <select class="tag_item" id="tag_id" name="tag_id">
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
          </select>
        <button class=addbutton>追加</button>
        </td>
      </tr>
    </table>
    </form>
  </div>

    <div class="item_area">
      <table>
        <tr>
          <th>作成日</th>
          <th></th>
          <th>タスク名</th>
          <th>タグ</th>
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
          <select class="tag_item" id="tag_id" name="tag_id">
            @foreach($tags as $tag)
            <option value="{{$tag->id}}" @if($tag->id == $todo->tag_id) selected @endif>{{$tag->name}}</option>
            @endforeach
          </select>
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
      {{$todos->links()}}
    </div>
  </div>
@endsection