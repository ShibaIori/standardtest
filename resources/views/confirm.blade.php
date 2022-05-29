@extends('layouts.default')

<style>
  .form {
    padding: 0 50px;
  }

  .input-wrap {
    display: flex;
    width: 100%;
    margin-bottom: 50px;
  }

  .label {
    width: 25%;
    font-weight: bold;
  }

  .input-inner:last-of-type {
    width: 80%;
  }

  .button-wrap {
    text-align: center;
  }

  .send {
  display: block;
  cursor: pointer;
  margin: 0 auto 5px;
  padding: 5px 40px;
  border-radius: 5px;
  background-color: black;
  font-weight: bold;
  color: white;
  }
  
  .back {
    font-size: 14px;
    color: black;
  }
</style>

@section('title', '内容確認')

@section('content')
<form action="/thanks" method="POST" id="confirm" name="confirm" class="form">
  @csrf
  <div class="input-wrap">
    <p class="label">お名前</p>
    <div class="input-inner">
      {{$input['firstname'].$input['lastname']}}
      <input type="hidden" name="fullname" value="{{$input['firstname'].$input['lastname']}}">
    </div>
  </div>
  <div class="input-wrap">
    <p class="label">性別</p>
    @if ($input['gender'] === '1')
      男性
    @else
      女性
    @endif
    <input type="hidden" name="gender" value="{{$input['gender']}}">
  </div>
  <div class="input-wrap">
    <p class="label">メールアドレス</p>
    <div class="input-inner">
      {{$input['email']}}
      <input type="hidden" name="email" value="{{$input['email']}}">
    </div>
  </div>
  <div class="input-wrap">
    <p class="label">郵便番号</p>
    <div class="input-inner">
      {{$input['postcode']}}
      <input type="hidden" name="postcode" value="{{$input['postcode']}}">
    </div>
  </div>
  <div class="input-wrap">
    <p class="label">住所</p>
    <div class="input-inner">
      {{$input['address']}}
      <input type="hidden" name="address" value="{{$input['address']}}">
    </div>
  </div>
  <div class="input-wrap">
    <p class="label">建物名</p>
    <div class="input-inner">
      {{$input['building_name']}}
      <input type="hidden" name="building_name" value="{{$input['building_name']}}">
    </div>
  </div>
  <div class="input-wrap">
    <p class="label">ご意見</p>
    <div class="input-inner">
      {{$input['opinion']}}
      <input type="hidden" name="opinion" value="{{$input['opinion']}}">
    </div>
  </div>
  <div class="button-wrap">
    <button type="submit" name="action" value="send" class="send">送信</button>
    <a href="javascript:document.getElementById('confirm').submit()" name="action" value="back" class="back">修正する</a>
  </div>
</form>
@endsection