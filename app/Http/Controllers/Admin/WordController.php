<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\WordRequest;
use App\Http\Controllers\Controller;
use App\Word;

class WordController extends Controller
{
    public function index(Request $request)
    {
        $words = Word::all();
        return view('admin.word.index', compact('words'));
    }

    public function create(Request $request)
    {
        return view('admin.word.create');
    }

    public function store(WordRequest $request)
    {
        $params = [
            'language_id' => $request->language_id,
            'attribute_id' => $request->attribute_id,
            'word' => $request->word,
            'level' => $request->level,
            'definition' => $request->definition,
            'sound' => $request->sound,
        ];

        $word = Word::create($params);
        $flaseh_message = 'データを追加しました。';
        return redirect()->route('admin.word.show', ['id' => $word->id])->with('flash_message', $flaseh_message);
    }

    public function show(request $request, $id = '')
    {
        $word = Word::ofId($id)->first();
        return view('admin.word.show', compact('word'));
    }

    public function update(WordRequest $request)
    {
        $word = Word::ofId($request->id)->first();
        $word->word = $request->word;
        $word->level = $request->level;
        $word->definition = $request->definition;
        $word->save();

        $flaseh_message = 'データを更新しました。';
        return redirect()->route('admin.word.show', ['id' => $word->id])->with('flash_message', $flaseh_message);
    }

    public function destroy(WordRequest $request)
    {
        $word = Word::ofId($request->id)->first();
        $word->delete();

        $flaseh_message = 'データを削除しました。';
        return redirect()->route('admin.word')->with('flash_message', $flaseh_message);
    }
}
