@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm-form">
  <div class="confirm-form__title">
    <h2>Confirm</h2>
  </div>
  <form class="confirm-form__inner" action="/thanks" method="post">
    @csrf
    <table class="confirm-table">
        <tr>
            <th>お名前</th>
            <td>{{$request->first_name}}　{{$request->last_name}}</td>
            <input type="hidden" name="first_name" value="{{$request->first_name}}">
            <input type="hidden" name="last_name" value="{{$request->last_name}}">
        </tr>
        <tr>
            <th>性別</th>
            <td>
                @if(($request->gender)==0)
                    男性
                @elseif(($request->gender)==1)
                    女性
                @elseif(($request->gender)==2)
                    その他
                @endif
                <input type="hidden" name="gender" value="{{$request->gender}}">
            </td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>{{$request->email}}</td>
            <input type="hidden" name="email" value="{{$request->email}}">
        </tr>
        <tr>
            <th>電話番号</th>
            <td>{{$request->tel_first}}{{$request->tel_second}}{{$request->tel_third}}</td>
            <input type="hidden" name="tel_first" value="{{$request->tel_first}}">
            <input type="hidden" name="tel_second" value="{{$request->tel_second}}">
            <input type="hidden" name="tel_third" value="{{$request->tel_third}}">
        </tr>
        <tr>
            <th>住所</th>
            <td>{{$request->address}}</td>
            <input type="hidden" name="address" value="{{$request->address}}">
        </tr>
        <tr>
            <th>建物名</th>
            <td>{{$request->building}}</td>
            <input type="hidden" name="building" value="{{$request->building}}">
        </tr>
        <tr>
            <th>お問い合わせの種類</th>
            <td>{{$category->content}}</td>
            <input type="hidden" name="category_id" value="{{$request->category_id}}">
        </tr>
        <tr>
            <th>お問い合わせ内容</th>
            <td>{{$request->detail}}</td>
            <input type="hidden" name="detail" value="{{$request->detail}}">
        </tr>
    </table>
    <div class="confirm-table__button">
        <input class="button-submit" type="submit" name="submit" value="送信">
        <input class="button-back" type="submit" name="back" value="修正">
        <!-- <a href="/">test</a> -->
    </div>
  </form>

</div>
@endsection