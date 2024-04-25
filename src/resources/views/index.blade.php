@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contacts-form">
  <div class="contacts-form__title">
    <h2>Contact</h2>
  </div>
  <form class="contacts-form__inner" action="/confirm" method="post">
    @csrf
    <table class="contact-table">
      <tr>
        <th>お名前<span style="color:red">※</span><br>
        @error('first_name')
        <span style="color:red">
          {{$errors->first('first_name')}}
        </span><br>
        @enderror
        @error('last_name')
        <span style="color:red">
          {{$errors->first('last_name')}}
        </span>
        @enderror
        </th>
        <td>
          <div class="contact-table__input-name">
            @if(session('first_name'))
            <input class="contact-table__name" type="text" name="first_name" placeholder="例：山田" value="{{session('first_name')}}">
            @else
            <input class="contact-table__name" type="text" name="first_name" placeholder="例：山田" value="{{old('first_name')}}">
            @endif
            @if(session('last_name'))
            <input class="contact-table__name" type="text" name="last_name" placeholder="例：太郎" value="{{session('last_name')}}">
            @else
            <input class="contact-table__name" type="text" name="last_name" placeholder="例：太郎" value="{{old('last_name')}}">
            @endif
          </div>
        </td>
      </tr>
      <tr>
        <th>性別<span style="color:red">※</span><br>
        @error('gender')
        <span style="color:red">
          {{$errors->first('gender')}}
        </span><br>
        @enderror
        </th>
        <td>
          <div class="contact-table__input-gender">
            @if(session('gender'))
            <input type="radio" name="gender" value="0" {{ session('gender') == 0 ? 'checked' : '' }} checked>男性
            <input type="radio" name="gender" value="1" {{ session('gender') == 1 ? 'checked' : '' }}>女性
            <input type="radio" name="gender" value="2" {{ session('gender') == 2 ? 'checked' : '' }}>その他
            @else
            <input type="radio" name="gender" value="0" {{ old ('gender') == 0 ? 'checked' : '' }} checked>男性
            <input type="radio" name="gender" value="1" {{ old ('gender') == 1 ? 'checked' : '' }}>女性
            <input type="radio" name="gender" value="2" {{ old ('gender') == 2 ? 'checked' : '' }}>その他
            @endif
          </div>
        </td>
      </tr>
      <tr>
        <th>メールアドレス<span style="color:red">※</span><br>
        @error('email')
        <span style="color:red">
          {{$errors->first('email')}}
        </span><br>
        @enderror
        </th>
        <td>
          <div class="contact-table__input-email">
            @if(session('email'))
            <input class="contact-table__text" type="text" name="email" placeholder="例：test@example.com" value="{{session('email')}}">
            @else
            <input class="contact-table__text" type="text" name="email" placeholder="例：test@example.com" value="{{old('email')}}">
            @endif
          </div>
        </td>
      </tr>
      <tr>
        <th>電話番号<span style="color:red">※</span><br>
        <span style="color:red">
        @if($errors->has('tel1'))
          {{$errors->first('tel1')}}
        @elseif($errors->has('tel2'))
          {{$errors->first('tel2')}}
        @elseif($errors->has('tel3'))
          {{$errors->first('tel3')}}
        </span><br>
        @endif
        </th>
        <td>
          <div class="contact-table__input-tel">
            @if(session('tel_first'))
            <input class="contact-table__tel" type="text" name="tel_first" placeholder="例：080" value="{{session('tel_first')}}"> -
            @else
            <input class="contact-table__tel" type="text" name="tel_first" placeholder="例：080" value="{{old('tel_first')}}"> -
            @endif
            @if(session('tel_second'))
            <input class="contact-table__tel" type="text" name="tel_second" placeholder="例：1234" value="{{session('tel_second')}}"> -
            @else
            <input class="contact-table__tel" type="text" name="tel_second" placeholder="例：1234" value="{{old('tel_second')}}"> -
            @endif
            @if(session('tel_third'))
            <input class="contact-table__tel" type="text" name="tel_third" placeholder="例：5678" value="{{session('tel_third')}}">
            @else
            <input class="contact-table__tel" type="text" name="tel_third" placeholder="例：5678" value="{{old('tel_third')}}">
            @endif
          </div>
        </td>
      </tr>
      <tr>
        <th>住所<span style="color:red">※</span><br>
        @error('address')
        <span style="color:red">
          {{$errors->first('address')}}
        </span><br>
        @enderror
        </th>
        <td>
          <div class="contact-table__input-address">
            @if(session('address'))
            <input class="contact-table__text" type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{session('address')}}">
            @else
            <input class="contact-table__text" type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{old('address')}}">
            @endif
          </div>
        </td>
      </tr>
      <tr>
        <th>建物名</th>
        <td>
          <div class="contact-table__input-building">
            @if(session('building'))
            <input class="contact-table__text" type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{session('building')}}">
            @else
            <input class="contact-table__text" type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{old('building')}}">
            @endif
          </div>
        </td>
      </tr>
      <tr>
        <th>お問い合わせの種類<span style="color:red">※</span><br>
        @error('category_id')
        <span style="color:red">
          {{$errors->first('category_id')}}
        </span><br>
        @enderror
        </th>
        <td>
          <div class="contact-table__input-category">
            <select class="contact-table__text" name="category_id">
              @if(session('category_id'))
              <option hidden value="" @if(session('category_id')==0) selected @endif>選択してください</option>
              <!-- <option value="1" @if(session('category_id')==1) selected @endif>test1</option>
              <option value="2" @if(session('category_id')==2) selected @endif>test2</option>
              <option value="3" @if(session('category_id')==3) selected @endif>test3</option> -->
              @foreach($categories as $cate)
              <option value={{$cate->id}} @if(session('category_id')==$cate->id) selected @endif>{{$cate->content}}</option>
              @endforeach
              @else
              <option hidden value="" @if(old('category_id')==0) selected @endif>選択してください</option>
              <!-- <option value="1" @if(old('category_id')==1) selected @endif>test1</option>
              <option value="2" @if(old('category_id')==2) selected @endif>test2</option>
              <option value="3" @if(old('category_id')==3) selected @endif>test3</option> -->
              @foreach($categories as $cate)
              <option value={{$cate->id}} @if(old('category_id')==$cate->id) selected @endif>{{$cate->content}}</option>
              @endforeach
              @endif
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <th>お問い合わせ内容<span style="color:red">※</span><br>
        @error('detail')
        <span style="color:red">
          {{$errors->first('detail')}}
        </span><br>
        @enderror
        </th>
        <td>
          <div class="contact-table__input-detail">
            @if(session('detail'))
            <textarea class="contact-table__textarea" rows="5" cols="50" name="detail" placeholder="お問い合わせ内容をご記載ください">{{session('detail')}}</textarea>
            @else
            <textarea class="contact-table__textarea" rows="5" cols="50" name="detail" placeholder="お問い合わせ内容をご記載ください">{{old('detail')}}</textarea>
            @endif
          </div>
        </td>
      </tr>
    </table>
    <div class="contacts-form__button">
      <input class="contacts-form__button-submit" type="submit" name="button-submit" value="確認画面">
    </div>
  </form>
</div>
@endsection