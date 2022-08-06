@extends('layouts.default')

@section('title', 'CHOACHTECH')

@section('content')
<form action="find" method="POST">
  @csrf
  <input type="text" name="input" value="{{$input}}">
  <input type="button" value="見つける">
</form>
@if (@isset($todo))
<table>
  <tr>
    <th>作成日</th>
    <th>タスク名</th>
    <th>更新</th>
    <th>削除</th>
  </tr>

  <tr>
    <td>
      {{$todo->created_at}}
    </td>
    <td>
      {{$todo->content}}
    </td>
    <td>
      <input type="button" name="edit" class="edit" value="更新">
    </td>
    <td>
      <input type="button" name="delete" class="delete" value="削除">
    </td>
  </tr>

</table>
@endif
@endsection