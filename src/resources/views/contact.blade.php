@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}" />
<link rel="stylesheet" href="{{ asset('css/contact.css') }}" />
@endsection

@section('content')
<div class="contact__content">
    <div class="section__heading">
        <h2>Contact</h2>
    </div>
    <form class="contact-form" action="/confirm" method="post">
        @csrf

        {{-- お名前 --}}
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact__label--item">お名前</span>
                <span class="contact__label--required">※</span>
            </div>
            <div class="contact-form__group-content contact-form__input--text">
                <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
                <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}">
                @error('first_name')<div class="contact-form__error">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- 性別 --}}
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact__label--item">性別</span>
                <span class="contact__label--required">※</span>
            </div>
            <div class="contact-form__group-content contact-form__input--radio">
                <label><input type="radio" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : '' }}>男性</label>
                <label><input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>女性</label>
                <label><input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}>その他</label>
            </div>
            @error('gender')<div class="contact-form__error">{{ $message }}</div>@enderror
        </div>

        {{-- メールアドレス --}}
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact__label--item">メールアドレス</span>
                <span class="contact__label--required">※</span>
            </div>
            <div class="contact-form__group-content contact-form__input--text">
                <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                @error('email')<div class="contact-form__error">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- 電話番号 --}}
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact__label--item">電話番号</span>
                <span class="contact__label--required">※</span>
            </div>
            <div class="contact-form__group-content contact-form__input--tel">
                <input type="tel" name="tel_area_code" placeholder="例: 080" value="{{ old('tel_area_code') }}" />
                <span>-</span>
                <input type="tel" name="tel_local_number" placeholder="例: 1234" value="{{ old('tel_local_number') }}" />
                <span>-</span>
                <input type="tel" name="tel_sub_number" placeholder="例: 5678" value="{{ old('tel_sub_number') }}" />
            </div>
            @error('tel')<div class="contact-form__error">{{ $message }}</div>@enderror
        </div>

        {{-- 住所 --}}
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact__label--item">住所</span>
                <span class="contact__label--required">※</span>
            </div>
            <div class="contact-form__group-content contact-form__input--text">
                <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1ー2ー3" value="{{ old('address') }}" />
                @error('address')<div class="contact-form__error">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- 建物名 --}}
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact__label--item">建物名</span>
            </div>
            <div class="contact-form__group-content contact-form__input--text">
                <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}" />
            </div>
        </div>

        {{-- お問い合わせの種類 --}}
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact__label--item">お問い合わせの種類</span>
                <span class="contact__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <select class="contact-form__item-select" name="category_id">
                    <option value="">選択してください</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<div class="contact-form__error">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- お問い合わせ内容 --}}
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact__label--item">お問い合わせ内容</span>
                <span class="contact__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <textarea name="details" placeholder="お問い合わせ内容をご記入ください">{{ old('details') }}</textarea>
                @error('details')<div class="contact-form__error">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- ボタン --}}
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection
