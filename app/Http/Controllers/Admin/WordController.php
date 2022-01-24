<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\WordRequest;
use App\Http\Controllers\Controller;
use App\Word;
use Excel;

class WordController extends Controller
{
    public function index(Request $request)
    {
        $words = Word::limit(Word::DISPLAY_NUMBER)->orderBy('word', 'asc')->get();
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

    public function show(Request $request, $id = '')
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


    // 単語検索
    public function search(Request $request)
    {
        $params = $request->all();

        if (!is_null($params['keyword'])) {
            $words = Word::ofKeyword($params['keyword']);
        }

        if (!is_null($params['attribute_id'])) {
            $words = Word::ofAttributeId($params['attribute_id']);
        }

        if (!is_null($params['language_id'])) {
            $words = Word::ofLanguageId($params['language_id']);
        }

        if (!is_null($params['level'])) {
            $words = Word::ofLevel($params['level']);
        }

        $words = isset($words)
            ? $words->limit(Word::DISPLAY_NUMBER)
            : Word::limit(Word::DISPLAY_NUMBER);
        $words = $words->orderBy('word', 'asc')->get();

        return view('admin.word.index', compact('words', 'params'));
    }

    public function uplodeExcelFile(Request $request)
    {
        $file = $request->file('file');
        $rows = Excel::load($file->getRealPath(), function ($reader) {
        })->get();

        $rows = $rows->toArray();

        $flaseh_message = 'Excelファイルのアップロードが完了しました。';
        return redirect()->route('admin.word')->with('flash_message', $flaseh_message);
    }
}
