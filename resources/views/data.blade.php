@extends('layouts.default')

<style>
  .form {
    padding: 40px;
    border: 2px solid black;
  }

  .input-wrap {
    display: flex;
    width: 100%;
    margin-bottom: 40px;
  }

  .input-wrap-gender{
    display: flex;
    margin-top: 10px;
    margin-left: 40px;
  }

  .label {
    width: 200px;
    padding-top: 10px;
    font-weight: bold;
  }

  .label-gender {
    width: 80px;
    font-weight: bold;
  }

  .textfield {
    width: 200px;
    height: 35px;
    border: 1px solid grey;
    border-radius: 5px;
  }

  .gender {
    transform:scale(3);
    margin-right: 20px;
  }

  .gender:not(:first-of-type) {
    margin-left: 40px;
  }

  .to {
    padding: 10px 30px;
    font-weight: bold;
  }

  .button-wrap {
    text-align: center;
  }

  .search {
  display: block;
  cursor: pointer;
  margin: 0 auto 5px;
  padding: 5px 50px;
  border-radius: 5px;
  background-color: black;
  font-weight: bold;
  color: white;
  }
  
  .reset {
    font-size: 14px;
    color: black;
  }

  svg.w-5.h-5 {
    width: 30px;
    height: 30px;
    }

  .list {
    width: 100%;
    margin-top: 30px;
    text-align: center;
  }

  .list tr{
    
  }

  .list tr:first-of-type {
    border-bottom: 2px solid black;
  }

  .list th,
  .list td{
    padding: 10px 0;
  }

  .delete {
    display: block;
    cursor: pointer;
    margin: 0 auto;
    padding: 5px 10px;
    border-radius: 5px;
    background-color: black;
    font-weight: bold;
    color: white;
  }
</style>

@section('title', '管理システム')

@section('content')
<form action="/find" method="post" class="form">
  @csrf
  <div class="input-wrap">
    <p class="label">お名前</p>
    <div class="input-inner">
      <input type="text" name="fullname" value="{{$input['fullname']}}" class="textfield">
    </div>
    @if ($input['gender'] === '0')
    <div class="input-wrap-gender">
      <p class="label-gender">性別</p>
      <input type="radio" name="gender" value="0" checked class="gender">全て
      <input type="radio" name="gender" value="1" class="gender">男性
      <input type="radio" name="gender" value="2" class="gender">女性
    </div>
    @elseif ($input['gender'] === '1')
    <div class="input-wrap-gender">
      <p class="label-gender">性別</p>
      <input type="radio" name="gender" value="0"  class="gender">全て
      <input type="radio" name="gender" value="1" checked class="gender">男性
      <input type="radio" name="gender" value="2" class="gender">女性
    </div>
    @else
    <div class="input-wrap-gender">
      <p class="label-gender">性別</p>
      <input type="radio" name="gender" value="0"  class="gender">全て
      <input type="radio" name="gender" value="1" class="gender">男性
      <input type="radio" name="gender" value="2" checked class="gender">女性
    </div>
    @endif
  </div>
  <div class="input-wrap">
    <p class="label">登録日</p>
    <div class="input-inner">
      <input type="date" name="date_start" value="{{$input['date_start']}}" class="textfield">
    </div>
    <p class="to">~</p>
    <div class="input-inner">
      <input type="date" name="date_end" value="{{$input['date_end']}}" class="textfield">
    </div>
  </div>
    <div class="input-wrap">
    <p class="label">メールアドレス</p>
    <div class="input-inner">
      <input type="text" name="email" value="{{$input['email']}}" class="textfield">
    </div>
  </div>
  <div class="button-wrap">
    <button type="submit" class="search">検索</button>
    <a href="/data" class="reset">リセット</a>
  </div>
</form>

{{ $items->links() }}

<table class="list">
  <tr>
    <th width="10%">ID</th>
    <th width="10%">お名前</th>
    <th width="10%">性別</th>
    <th width="20%">メールアドレス</th>
    <th width="40%">ご意見</th>
  </tr>
  @foreach ($items as $item)
    <tr>
      <td width="10%">{{$item->id}}</td>
      <td width="10%">{{$item->fullname}}</td>
      <td width="10%">{{$item->getGender()}}</td>
      <td width="20%">{{$item->email}}</td>
      <td width="40%" title="{{$item->opinion}}">{{$item->getShortOpinion()}}</td>
      <td width="10%">
        <form action="/delete?id={{$item->id}}" method="POST">
          @csrf
          <button type="submit" class="delete">削除</button>
        </form>
      </td>
    </tr>
  @endforeach
</table>

@endsection