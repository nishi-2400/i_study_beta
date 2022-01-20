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
                <div class="card-header">文章追加</div>
                <div class="card-body">
                    <form id="sententceSubmit" action="{{ route('admin.sentence.store') }}" method="POST">
                        @csrf
                        <ul>
                            <li>
                                <select name="language_id">
                                    <option value="" disabled @if(is_null(old('language_id'))) selected @endif>Select Langueage</option>
                                    @foreach (\AdminConst::LANGUAGES as $lang_id => $language)
                                        <option value="{{ $lang_id }}" @if($lang_id === old('language_id')) selected @endif>{{ $language }}</option>
                                    @endforeach
                                </select>
                            </li>
                            <li>
                                <input type="text" name="sentence" value="{{ old('sentence') }}">
                            </li>
                            <li>
                                <select name="level">
                                    <option value="" selected >Select level</option>
                                    @foreach (\AdminConst::LANGUAGE_LEVEL as $level_id => $level)
                                        <option value="{{ $level_id }}" {{ isset($params) && $params['level'] == $level_id ? 'selected' : '' }}>{{ $level }}</option>
                                    @endforeach
                                </select>
                            </li>
                            <li>
                                <input type="text" name="meaning" value="{{ old('meaning') }}">
                            </li>
                        </ul>
                    </form>

                    <div>
                        <button form="sententceSubmit">追加</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">

</script>
@endsection
