@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}" />
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
    <div class="confirm__container">
        <div class="confirm_-header">
            <h2>Confirm</h2>
    </div>

    <div class="confirm-table">
        <table class="confirm-table__inner">
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お名前</th>
                <td class="confirm-table__text">
                    <span>"{{ $contact['name'] }}"</span>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__gender">性別</th>
                <td class="confirm-table__text">
                    <span>"{{ $contact['gender'] }}"</span>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__email">メールアドレス</th>
                <td class="confirm-table__text">
                    <span>"{{ $contact['email'] }}"</span>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__tel">電話番号</th>
                <td class="confirm-table__text">
                    <span>"{{ $contact['tel'] }}"</span>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__address">住所</th>
                <td class="confirm-table__text">
                    <span>"{{ $contact['address'] }}"</span>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__building">建物名</th>
                <td class="confirm-table__text">
                    <span>"{{ $contact['building'] }}"</span>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__inquiry_type">お問い合わせの種類</th>
                <td class="confirm-table__text">
                    <span>"{{ $contact['inquiry_type'] }}"</span>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__detail">お問い合わせ内容</th>
                <td class="confirm-table__text">
                    <span>"{{ $contact['detail'] }}"</span>
                </td>
            </tr>
        </table>
    </div>

    <form action="/contacts" method="POST" class="form confirm-form">
        @csrf
        @foreach ($contact as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <button type="submit" name="action" value="submit">送信</button>
    </form>
    <form action="/contact/confirm" method="POST" class="form confirm-form">
        @csrf
        @foreach ($contact as $key => $value)
            <input type="hidden" name="{{ ($key }}" value="{{ $value }}">
        @endforeach
        <button type="submit" name="edit" value="edit">修正</button>
    </form>
@endsection