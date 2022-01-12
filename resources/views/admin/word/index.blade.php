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
                <div class="card-header">単語検索</div>
                <div class="card-body">
                    <form action="">
                        <input id="" class="" type="text" name="keyword" value="{{ old('keyword') }}" placeholder="単語検索">
                        {{-- {{ Form::text('question_category', old('question_category'), ['placeholder' => '問題カテゴリを入力']) }} --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div>単語一覧</div>
                    <div>
                        <a href="{{ route('admin.word.create') }}">単語追加</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td>言語</td>
                            <td>品詞</td>
                            <th>単語</th>
                            <th>レベル</th>
                            <th>意味</th>
                            <th></th>
                        </tr>
                        @if ($words)
                            @foreach ($words as $word)
                                <tr>
                                    <td>{{ $word->id }}</td>
                                    <td>{{ \AdminConst::LANGUAGES[$word->language_id] }}</td>
                                    <td>{{ \AdminConst::ATTRIBUTES[$word->attribute_id] }}</td>
                                    <td>{{ $word->word }}</td>
                                    <td>{{ $word->level }}</td>
                                    <td>{{ $word->definition }}</td>
                                    <td>
                                        <a href="{{ route('admin.word.show', ['id' => $word->id]) }}">編集</a>
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
