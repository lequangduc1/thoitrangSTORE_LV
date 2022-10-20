<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequest extends FormRequest
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
            'logo' => 'mimetypes:png,jpg,jpeg',
            'favicon' => 'mimetypes:png,jpg,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'logo.mimetypes'=>'Định dạnh ảnh phải là png,jpg,jpeg',
            'favicon.mimetypes'=>'Định dạnh ảnh phải là png,jpg,jpeg'
        ];

    }
}
