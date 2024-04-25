@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin-form">
    <div class="admin-form__content">
        <div class="admin-form__title">
            <h2>Admin</h2>
        </div>
        <div class="admin-form__nav">
            <form class="search-form" action="/admin" method="post">
                @csrf
                <input class="" type="text" name="searchText" placeholder="名前やメールアドレスを入力してください">
                <select class="">
                    <option hidden value="">性別</option>
                    <option name="gender" value="0">男</option>
                    <option name="gender" value="1">女</option>
                    <option name="gender" value="2">その他</option>
                </select>
                <select class="">
                    <option hidden value="">お問い合わせ内容</option>
                    @foreach($categories as $cate)
                    <option name="category_id" value={{$cate->id}}>{{$cate->content}}</option>
                    @endforeach
                </select>
                <input class="" type="date" name="date">
                <input class="" type="submit" name="" value="検索">
                <input class="" type="submit" name="" value="リセット">
            </form>
            <div class="search-form__custom">
                <div class="">
                    <input type="submit" value="エクスポート">
                </div>
                <div class="pagination">{{$contacts->links()}}</div>
            </div>
            <table>
                <tr class="table__header">
                    <th class="table__header-name">お名前</th>
                    <th class="table__header-gender">性別</th>
                    <th class="table__header-email">メールアドレス</th>
                    <th class="table__header-category">お問い合わせの種類</th>
                    <th></th>
                </tr>
                @foreach($contacts as $contact)
                <tr>
                    <td class="table__data-name">{{$contact->first_name}} {{$contact->last_name}}</td>
                    <td class="table__data-gender">
                        @if(($contact->gender)==0)
                            男性
                        @elseif(($contact->gender)==1)
                            女性
                        @elseif(($contact->gender)==2)
                            その他
                        @endif
                    </td>
                    <td class="table__data-email">{{$contact->email}}</td>
                    <td class="table__data-category">{{$contact->content}}</td>
                    <td class="table__data-button"><button class="table__data-button-detail">詳細</button></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection