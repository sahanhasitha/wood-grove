<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            "name" => "required",
            "address" => "required",
            "phone" => "required|min:10|max:15",
            "description" => "required",
            "type_id" => "required",
            "website" => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
        ];
    }
    public function messages()
    {
        return [
            'phone.min' => 'The phone must be at least 10 digits',
            'phone.max' => 'The phone may not be greater than 15 digits',
        ];
    }

}
