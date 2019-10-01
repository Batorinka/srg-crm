<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GsobjectCreateRequest extends FormRequest
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
            'main_contract_id'      => 'required|integer|exists:main_contracts,id',
            'TO_contract_id'        => 'required|integer|exists:t_o_contracts,id',
            'unit_id'               => 'required|integer|exists:units,id',
            'name'                  => 'required|min:3|max:100',
            'address'               => 'required|min:3|max:100',
            'grs'                   => 'required|min:3|max:100',
            'member_position'       => 'required|min:3|max:100',
            'member_name'           => 'required|min:3|max:100',
            'stamp_act_date'        => 'required|date',
        ];
    }
}
