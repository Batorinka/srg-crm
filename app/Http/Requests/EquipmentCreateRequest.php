<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentCreateRequest extends FormRequest
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
            'gsobject_id'       => 'required|integer|exists:gsobjects,id',
            'equipment_name_id' => 'required|integer|exists:equipment_names,id',
            'quantity'          => 'required|min:1|max:3',
            'power'             => 'required|min:1|max:100',
        ];
    }
}
