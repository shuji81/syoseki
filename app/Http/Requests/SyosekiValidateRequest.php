<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SyosekiValidateRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'name'=>'required',
        'category'=>'required',
        'num'=>'required|numeric',
        ];
    }

    public function messages() {
      return [
      "required" => "必須項目です。",
      "numeric" => "数値で入力してください。",
      ];
    }
}
