<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetupValuesUpdateRequest extends FormRequest
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
            'id'                => 'request|integer|exists:setup_values,id',
            'zero_group'        => 'required',
            'first_group'       => 'required',
            'second_group'      => 'required',
            'third_group'       => 'required',
            'fourth_group'      => 'required',
            'fifth_group'       => 'required',
            'sixth_group'       => 'required',
            'special_increase'  => 'required',
        ];
    }
}
