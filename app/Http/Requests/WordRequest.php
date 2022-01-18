<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WordRequest extends FormRequest
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
            'attribute_id' => '品詞',
            'word' => '単語',
            'level' => 'レベル',
            'definition' => '意味',
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
            'attribute_id.required' => ':attributeを入力してください',
            'word.required' => ':attributeを入力してください。',
            'level.required' => ':attributeを入力してください。',
            'definition.required' => ':attributeを入力してください。',
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
            'attribute_id' => 'required',
            'word' => 'required',
            'level' => 'required',
            'definition' => 'required',
        ];
    }
}
