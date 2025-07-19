@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('content')
@if (Auth::check())
<form class="form" action="/logout" method="post">
    @csrf
    <button class="header-nav__button">ログアウト</button>
</form>
@endif

<div class="admin__content">
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>

    <div class="admin__content-search">
        <form class="search-form" action="/admin" method="get">
            @csrf
            <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword') }}">
            <select class="search-form__gender-select" name="gender" placeholder="性別">
                <option value="man" @if( old('gender') === 'man') selected @endif>男</option>
                <option value="woman" @if( old('gender') === 'woman') selected @endif>女</option>
                <option value="other" @if( old('gender') === 'other') selected @endif>その他</option>
            </select>
            <select class="search-form__category-select" name="inquiry_type">
                <option value="" disabled {{ old('inquiry_type') ? '' : 'selected '}}>お問い合わせの種類</option>
                <option value="delivery" {{ old('inquiry_type') == 'delivery' ? 'selected' : ''}}>1.商品のお届けについて</option>
                <option value="change" {{ old('inquiry_type') == 'change' ? 'selected' : ''}}>2.商品の交換について</option>
                <option value="trouble" {{ old('inquiry_type') == 'trouble' ? 'selected' : ''}}>3.商品トラブル</option>
                <option value="contact" {{ old('inquiry_type') == 'contact' ? 'selected' : ''}}>4.ショップへのおといあわせ</option>
                <option value="others" {{ old('inquiry_type') == 'others' ? 'selected' : ''}}>5.その他</option>
            </select>
            <input type="date" name="date" placeholder="年/月/日" value="{{ request('date') }}">
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
            <div class="search-form__reset">
                <button class="search-form__reset-button" type="reset">リセット</button>
            </div>
        </form>
    </div>

    <div class="admin__content-export">
        <form method="post" action="{{ route('inquiries.export') }}">
            @csrf
            <button type="submit">エクスポート</button>
        </form>
    </div>

    <div class="admin__content-table">
        <table class="admin__content-table__inner">
            <thead>
                <tr class="admin__content-table__row">
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                <tr>
                    <td>{{$admin->last_name ?? '' }}{{ $admin->first_name ?? '' }}</td>
                    <td>{{$admin->gender ?? ''}}</td>
                    <td>{{$admin->email ?? ''}}</td>
                    <td>{{$admin->inquiry_type ?? ''}}</td>
                    <td>
                        @if ($admin->id)
                        <a href="{{ route('admin.index', ['detail' => $admin->id]) }}">詳細</a> 
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

  <div class="page">
    {{ $admins->links()}}
  </div>

</div>

{{-- @if ($detailAdmin)
<div class="modal-overlay">
    <div class="modal-window">
        <a href="{{ route('admin.index') }}" class="modal-close">×</a>

        <div class="modal-row">
            <div class="modal-label">お名前</div>
            <div class="modal-value">{{ $detailAdmin->last_name }}　{{ $detailAdmin->first_name }}</div>
        </div>

        <div class="modal-row">
            <div class="modal-label">性別</div>
            <div class="modal-value">{{ $detailAdmin->gender }}</div>
        </div>

        <div class="modal-row">
            <div class="modal-label">メールアドレス</div>
            <div class="modal-value">{{ $detailAdmin->email }}</div>
        </div>

        <div class="modal-row">
            <div class="modal-label">電話番号</div>
            <div class="modal-value">0{{ $detailAdmin->tel_area_code }}{{ $detailAdmin->tel_local_number }}{{ $detailAdmin->tel_sub_number }}</div>
        </div>

        <div class="modal-row">
            <div class="modal-label">住所</div>
            <div class="modal-value">{{ $detailAdmin->address }}</div>
        </div>

        <div class="modal-row">
            <div class="modal-label">建物名</div>
            <div class="modal-value">{{ $detailAdmin->building }}</div>
        </div>

        <div class="modal-row">
            <div class="modal-label">お問い合わせの種類</div>
            <div class="modal-value">{{ $detailAdmin->inquiry_type }}</div>
        </div>

        <div class="modal-row">
            <div class="modal-label">お問い合わせ内容</div>
            <div class="modal-value">{{ $detailAdmin->details }}</div>
        </div>

        <div class="modal-actions">
            <form action="{{ route('inquiries.delete', $detailAdmin->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">削除</button>
            </form>
        </div>
    </div>
</div>
@endif --}}

@endsection
