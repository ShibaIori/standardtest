@extends('layouts.default')

<style>
  .wrap {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
  }

  .inner {
    text-align: center;
  }

  .thanks {
    margin-bottom: 50px;
  }

  button {
    padding: 5px 15px;
    border-radius: 5px;
    background-color: black;
    font-weight: bold;
    color: white;
  }
</style>

@section('content')
<div class="wrap">
  <div class="inner">
    <h1 class="thanks">ご意見いただきありがとうございました。</h1>
    <button>トップページへ</button>
  </div>
</div>
@endsection