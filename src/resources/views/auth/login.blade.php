@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}" />
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="login-form__container">
    <div class="login-header">
        <div class="register-button__wrapper">
            <form action="{{ route('register') }}" method="get">
                <button type="submit" class="form__button-submit">新規登録</button>
            </form>
        </div>
        <h2 class="login-title">Login</h2>
    </div>
    
    <div class="login-card">
        <form class="form" action="/login" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                </div>
                <div class="form__group-content">
                    <div class="form__item--text">
                        <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}"/>
                    </div>
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">パスワード</span>
                </div>
                <div class="form__group-content">
                    <div class="form__item--text">
                        <input type="password" name="password" placeholder="例: coachtech1106"/>
                    </div>
                    <div class="form__error">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection