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
                <div class="card-header">文章一覧</div>
                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger m;">
                            @foreach ($errors->all() as $error)
                                <li class="ml-3">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form id="sentenceSubmit" action="{{ route('admin.sentence.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $sentence->id }}">
                        <ul>
                            <li>
                                <select name="language_id">
                                    <option value="" disabled @if(is_null(old('language_id') && !isset($sentence->language_id))) selected @endif>Select Langueage</option>
                                    @foreach (\AdminConst::LANGUAGES as $lang_id => $language)
                                        <option value="{{ $lang_id }}" @if($sentence->language_id == $lang_id) selected @endif>{{ $language }}</option>
                                    @endforeach
                                </select>
                                {{-- @error('language_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </li>
                            <li>
                                <input type="text" name="sentence" value="{{ $sentence->sentence }}" class="@error('sentence') is-invalid @enderror">
                                {{-- @error('word')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </li>
                            <li>
                                <select name="level">
                                    <option value="" selected disabled>Select level</option>
                                    @foreach (\AdminConst::LANGUAGE_LEVEL as $level_id => $level)
                                        <option value="{{ $level_id }}" {{ $sentence->level == $level_id ? 'selected' : '' }}>{{ $level }}</option>
                                    @endforeach
                                </select>
                                {{-- @error('level')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </li>
                            <li>
                                <input type="text" name="meaning" value="{{ $sentence->meaning }}" class="@error('meaning') is-invalid @enderror">
                                {{-- @error('definition')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </li>
                        </ul>
                    </form>

                    <div>
                        <button form="sentenceSubmit">変更</button>
                        <button type="button" onclick="formDelete('{{ route('admin.sentence.delete') }}')">削除</button>
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
        var form = document.getElementById('sentenceSubmit')
        var formData = new FormData(form)
        formData.delete('sentence')
        formData.delete('level')
        formData.delete('definition')

        form.action = url;
        form.submit()
    }
}
</script>
@endsection
