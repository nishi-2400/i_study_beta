@extends('admin.layouts.app')

@section('content')
<div class="container">
    @if (session('flash_message'))
        <div class="flash_message bg-success text-center py-3 my-0">
            {{ session('flash_message') }}
        </div>
    @endif

    <ul>
        <li><a href="{{ route('admin.user') }}">カテゴリ</a></li>
        <li><a href="{{ route('admin.user') }}"></a></li>
    </ul>
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">文章検索</div>
                <div class="card-body">
                    <form action="{{ route('admin.sentence.search') }}" method="POST">
                        @csrf
                        <input type="text" name="keyword" value="{{ $params['keyword'] ?? '' }}" placeholder="文章/意味検索">
                        <select name="language_id">
                            <option value="" selected >Select Langueage</option>
                            @foreach (\AdminConst::LANGUAGES as $lang_id => $language)
                                <option value="{{ $lang_id }}" {{ isset($params) && $params['language_id'] == $lang_id ? 'selected' : '' }}>{{ $language }}</option>
                            @endforeach
                        </select>

                        <select name="level">
                            <option value="" selected >Select level</option>
                            @foreach (\AdminConst::LANGUAGE_LEVEL as $level_id => $level)
                                <option value="{{ $level_id }}" {{ isset($params) && $params['level'] == $level_id ? 'selected' : '' }}>{{ $level }}</option>
                            @endforeach
                        </select>
                        <button>検索</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div>文章一覧</div>
                    <div>
                        <a href="{{ route('admin.sentence.create') }}">文章追加</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>文章</th>
                            <th>言語</th>
                            <th>レベル</th>
                            <th>意味</th>
                            <th></th>
                        </tr>
                        @if ($sentences)
                            @foreach ($sentences as $sentence)
                                <tr>
                                    <td>{{ $sentence->id }}</td>
                                    <td>{{ $sentence->sentence }}</td>
                                    <td>{{ \AdminConst::LANGUAGES[$sentence->language_id] }}</td>
                                    <td>{{ \AdminConst::LANGUAGE_LEVEL[$sentence->level] }}</td>
                                    <td>{{ $sentence->meaning }}</td>
                                    <td>
                                        <a href="{{ route('admin.sentence.show', ['id' => $sentence->id]) }}">編集</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection