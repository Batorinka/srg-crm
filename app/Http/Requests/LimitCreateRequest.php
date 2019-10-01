<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LimitCreateRequest extends FormRequest
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
            'gsobject_id'   => 'required|integer|exists:gsobjects,id',
            'group_id'      => 'required|integer|exists:groups,id',
            'year'          => 'required|integer',
            'supplier'      => 'required|min:3|max:100',
            'jan_4'         => 'required',
            'feb_4'         => 'required',
            'mar_4'         => 'required',
            'apr_4'         => 'required',
            'may_4'         => 'required',
            'jun_4'         => 'required',
            'jul_4'         => 'required',
            'aug_4'         => 'required',
            'sep_4'         => 'required',
            'oct_4'         => 'required',
            'nov_4'         => 'required',
            'dec_4'         => 'required',
            'jan_8'         => 'required',
            'feb_8'         => 'required',
            'mar_8'         => 'required',
            'apr_8'         => 'required',
            'may_8'         => 'required',
            'jun_8'         => 'required',
            'jul_8'         => 'required',
            'aug_8'         => 'required',
            'sep_8'         => 'required',
            'oct_8'         => 'required',
            'nov_8'         => 'required',
            'dec_8'         => 'required',
            'jan_10'        => 'required',
            'feb_10'        => 'required',
            'mar_10'        => 'required',
            'apr_10'        => 'required',
            'may_10'        => 'required',
            'jun_10'        => 'required',
            'jul_10'        => 'required',
            'aug_10'        => 'required',
            'sep_10'        => 'required',
            'oct_10'        => 'required',
            'nov_10'        => 'required',
            'dec_10'        => 'required',
        ];
    }
}
