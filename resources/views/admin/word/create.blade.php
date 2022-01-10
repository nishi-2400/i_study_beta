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
                <div class="card-header">単語追加</div>
                <div class="card-body">
                    <form id="wordSubmit" action="{{ route('admin.word.store') }}" method="POST">
                        @csrf
                        <ul>
                            <li>
                                <input type="text" name="word" value="{{ old('word') }}">
                            </li>
                            <li>
                                <input type="text" name="level" value="{{ old('level') }}">
                            </li>
                            <li>
                                <input type="text" name="definition" value="{{ old('definition') }}">
                            </li>
                            <li>
                                <input type="text" name="sound" value="{{ old('sound') }}">
                            </li>
                        </ul>
                    </form>

                    <div>
                        <button form="wordSubmit">追加</button>
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
