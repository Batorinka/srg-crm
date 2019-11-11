<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainContractCreateRequest extends FormRequest
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
            'main_contract_type_id' => 'required|integer|exists:main_contract_types,id',
            'company_full_name'     => 'required|min:3|max:100',
            'company_sub_name'      => 'required|min:3|max:100',
            'number'                => 'required|max:20',
            'signing_date'          => 'required|date',
            'start_date'            => 'required|date',
            'end_date'              => 'required|date',
            'contractor_position'   => 'required|min:3|max:100',
            'contractor_name'       => 'required|min:3|max:100',
            'contractor_cause'      => 'required|min:3|max:100',
            'requisites'            => 'required|min:10|max:300',
            'supply_contract'       => 'required|min:5|max:300',
        ];
    }
}
