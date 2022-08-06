@extends('layouts.default')

@section('title', 'COACHTECH')

@section('content')
<form action="/delete" method="POST">
  <table>
    @csrf
    <tr>
      <th>
        作成日
      </th>
      <td>
        <input type="text" name="id" value="{{$form->id}}">
      </td>
    </tr>
    <tr>
      <th>
        タスク名
      </th>
      <td>
        <input type="text" name="content" value="{{$form->content}}">
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