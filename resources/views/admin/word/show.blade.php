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
                <div class="card-header">単語一覧</div>
                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger m;">
                            @foreach ($errors->all() as $error)
                                <li class="ml-3">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form id="wordSubmit" action="{{ route('admin.word.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $word->id }}">
                        <ul>
                            <li>
                                <select name="language_id">
                                    <option value="" disabled @if(is_null(old('language_id') && !isset($word->language_id))) selected @endif>Select Langueage</option>
                                    @foreach (\AdminConst::LANGUAGES as $lang_id => $language)
                                        <option value="{{ $lang_id }}" @if($lang_id === $word->language_id) selected @endif>{{ $language }}</option>
                                    @endforeach
                                </select>
                                {{-- @error('language_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </li>
                            <li>
                                <select name="attribute_id">
                                    <option value="" disabled @if(is_null(old('attribute_id') && !isset($word->attribute_id))) selected @endif>Select Attribute</option>
                                    @foreach (\AdminConst::ATTRIBUTES as $attr_id => $attribute)
                                        <option value="{{ $attr_id }}" @if($attr_id === $word->attribute_id) selected @endif>{{ $attribute }}</option>
                                    @endforeach
                                </select>
                                {{-- @error('attribute_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </li>
                            <li>
                                <input type="text" name="word" value="{{ $word->word }}" class="@error('word') is-invalid @enderror">
                                {{-- @error('word')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </li>
                            <li>
                                <input type="text" name="level" value="{{ $word->level }}" class="@error('level') is-invalid @enderror">
                                {{-- @error('level')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </li>
                            <li>
                                <input type="text" name="definition" value="{{ $word->definition }}" class="@error('definition') is-invalid @enderror">
                                {{-- @error('definition')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
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
