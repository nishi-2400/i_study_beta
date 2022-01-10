@extends('admin.layouts.app')

@section('content')
<div class="container">
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
                <div class="card-header">単語一覧</div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td>ID</td>
                            <td>単語</td>
                            <td>属性</td>
                            <td>レベル</td>
                            <td>意味</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
