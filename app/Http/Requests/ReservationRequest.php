<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            "company_id" => "required",
            "start_date" => "required|date_format:Y-m-d|after:yesterday",
            "end_date" => "required|date_format:Y-m-d|after:yesterday",
            "description" => "required",
        ];
    }
}
