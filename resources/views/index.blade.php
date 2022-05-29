@extends('layouts.default')
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>

<style>
  .form {
    padding: 0 50px;
  }

  .input-wrap {
    display: flex;
    width: 100%;
    margin-bottom: 30px;
  }

  .input-wrap:nth-of-type(2) {
    margin-bottom: 40px;
  }

  .label {
    width: 25%;
    padding-top: 10px;
    font-weight: bold;
  }

  .required:after {
    content: "※";
    color: red;
    margin-left: 5px;
  }

  .textfield {
    width: 100%;
    height: 35px;
    border: 1px solid grey;
    border-radius: 5px;
  }

  .example {
    margin-top: 10px;
    margin-left: 10px;
    font-size: 14px;
    color: grey;
  }

  .input-inner {
    width: 80%;
  }

  .input-inner-name {
    width: 38%;
  }

  .input-inner-name:last-of-type {
    margin-left: 15px;
  }

  .gender {
    transform:scale(3);
    margin-right: 20px;
  }

  .gender:last-of-type {
    margin-left: 40px;
  }

  .post {
    display: inline-block;
    padding: 10px;
  }

  .opinion {
    border: 1px solid grey;
    border-radius: 5px;
  }

  .button-wrap {
    text-align: center;
  }

  .confirm {
    cursor: pointer;
    margin: 0 auto;
    padding: 5px 40px;
    border-radius: 5px;
    background-color: black;
    font-weight: bold;
    color: white;
  }

</style>

@section('title', 'お問い合わせ')

@section('content')
<form action="/confirm" method="POST" class="h-adr form">
  @csrf
  <div class="input-wrap">
    <p class="label required">お名前</p>
    <div class="input-inner-name">
      <input type="text" name="firstname" value="{{old('firstname')}}" class="textfield">
      <p class="example">例) 山田</p>
      @if ($errors->has('firstname'))
        <p>{{$errors->first('firstname')}}</p>
      @endif
    </div>
    <div class="input-inner-name">
      <input type="text" name="lastname" value="{{old('lastname')}}" class="textfield">
      <p class="example">例) 太郎</p>
      @if ($errors->has('lastname'))
        <p>{{$errors->first('lastname')}}</p>
      @endif
    </div>
  </div>
  <div class="input-wrap">
    <p class="label required">性別</p>
    <input type="radio" name="gender" value="1" checked class="gender">男性
    <input type="radio" name="gender" value="2"
    class="gender">女性
  </div>
  <div class="input-wrap">
    <p class="label required">メールアドレス</p>
    <div class="input-inner">
      <input type="email" name="email" value="{{old('email')}}" class="textfield">
      <p class="example">例) test@example.com</p>
      @if ($errors->has('email'))
        <p>{{$errors->first('email')}}</p>
      @endif
    </div>
  </div>
  <div class="input-wrap">
    <p class="label required">郵便番号</p>
    <span class="post">〒</span>
    <div class="input-inner">
      <span class="p-country-name" style="display:none;">Japan</span>
      <input type="text" name="postcode" value="{{old('postcode')}}" class="p-postal-code textfield">
      <p class="example">例) 123-4567</p>
      @if ($errors->has('postcode'))
        <p>{{$errors->first('postcode')}}</p>
      @endif
    </div>
  </div>
  <div class="input-wrap">
    <p class="label required">住所</p>
    <div class="input-inner">
      <input type="text" name="address" value="{{old('address')}}" class="p-region p-locality p-street-address p-extended-address textfield">
      <p class="example">例) 東京都渋谷区千駄ヶ谷1-2-3</p>
      @if ($errors->has('address'))
        <p>{{$errors->first('address')}}</p>
      @endif
    </div>
  </div>
  <div class="input-wrap">
    <p class="label">建物名</p>
    <div class="input-inner">
      <input type="text" name="building_name" value="{{old('building_name')}}" class="textfield">
      <p class="example">例) 千駄ヶ谷マンション101</p>
    </div>
  </div>
  <div class="input-wrap">
    <p class="label required">ご意見</p>
    <div class="input-inner">
      <textarea name="opinion" cols="60" rows="10" class="opinion">{{old('opinion')}}</textarea>
      @if ($errors->has('opinion'))
        <p>{{$errors->first('opinion')}}</p>
      @endif
    </div>
  </div>
  <div class="button-wrap">
    <button type="submit" class="confirm">確認</button>
  </div>
</form>
@endsection