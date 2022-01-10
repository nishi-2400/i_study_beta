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
                <div class="card-header">単語一覧</div>
                <div class="card-body">
                    <form id="wordSubmit" action="{{ route('admin.word.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $word->id }}">
                        <ul>
                            <li>
                                <input id="" class="update" type="text" name="word" value="{{ $word->word }}">
                            </li>
                            <li>
                                <input id="" class="update"  type="text" name="level" value="{{ $word->level }}">
                            </li>
                            <li>
                                <input id="" class="update" type="text" name="definition" value="{{ $word->definition }}">
                            </li>
                        </ul>
                    </form>

                    <div>
                        <button form="wordSubmit">変更</button>
                        <button type="button" onclick="formDelete('{{ route('admin.word.delete') }}')">削除</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">

function formDelete(url) {
    var result = window.confirm('削除しますか？')
    if (result) {
        var form = document.getElementById('wordSubmit')
        var formData = new FormData(form)
        formData.delete('word')
        formData.delete('level')
        formData.delete('definition')

        form.action = url;
        form.submit()
    }
}
</script>
@endsection
