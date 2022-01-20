<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SentenceRequest;
use App\Http\Controllers\Controller;
use App\Sentence;

class SentenceController extends Controller
{
    public function index(Request $request)
    {
        $sentences = Sentence::limit(Sentence::DISPLAY_NUMBER)->orderBy('sentence', 'asc')->get();
        return view('admin.sentence.index', compact('sentences'));
    }

    public function create(Request $request)
    {
        return view('admin.sentence.create');
    }

    public function store(SentenceRequest $request)
    {
        $params = [
            'language_id' => $request->language_id,
            'sentence' => $request->sentence,
            'level' => $request->level,
            'meaning' => $request->meaning,
        ];

        $sentence = Sentence::create($params);
        $flaseh_message = 'データを追加しました。';
        return redirect()->route('admin.sentence.show', ['id' => $sentence->id])->with('flash_message', $flaseh_message);
    }

    public function show(request $request, $id = '')
    {
        $sentence = Sentence::ofId($id)->first();
        return view('admin.sentence.show', compact('sentence'));
    }

    public function update(SentenceRequest $request)
    {
        $sentence = Sentence::ofId($request->id)->first();
        $sentence->sentence = $request->sentence;
        $sentence->level = $request->level;
        $sentence->meaning = $request->meaning;
        $sentence->save();

        $flaseh_message = 'データを更新しました。';
        return redirect()->route('admin.sentence.show', ['id' => $sentence->id])->with('flash_message', $flaseh_message);
    }

    public function destroy(SentenceRequest $request)
    {
        $sentence = Sentence::ofId($request->id)->first();
        $sentence->delete();

        $flaseh_message = 'データを削除しました。';
        return redirect()->route('admin.sentence')->with('flash_message', $flaseh_message);
    }

    // 文章検索
    public function search(Request $request)
    {
        $params = $request->all();

        if (!is_null($params['keyword'])) {
            $sentences = Sentence::ofKeyword($params['keyword']);
        }

        if (!is_null($params['language_id'])) {
            $sentences = Sentence::ofLanguageId($params['language_id']);
        }

        if (!is_null($params['level'])) {
            $sentences = Sentence::ofLevel($params['level']);
        }

        $sentences = isset($sentences)
            ? $sentences->limit(Sentence::DISPLAY_NUMBER)
            : Sentence::limit(Sentence::DISPLAY_NUMBER);
        $sentences = $sentences->orderBy('sentence', 'asc')->get();

        return view('admin.sentence.index', compact('sentences', 'params'));
    }
}
