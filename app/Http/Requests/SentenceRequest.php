<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SentenceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'language_id' => '言語',
            'sentence' => '文章',
            'level' => 'レベル',
            'meaning' => '意味',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'language_id.required' => ':attributeを入力してください。',
            'sentence.required' => ':attributeを入力してください。',
            'level.required' => ':attributeを入力してください。',
            'meaning.required' => ':attributeを入力してください。',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'language_id' => 'required',
            'sentence' => 'required',
            'level' => 'required',
            'meaning' => 'required',
        ];
    }
}
