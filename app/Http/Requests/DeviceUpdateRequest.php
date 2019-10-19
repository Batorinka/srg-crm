<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceUpdateRequest extends FormRequest
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
            'id'                => 'request|integer|exists:devices,id',
            'gsobject_id'       => 'required|integer|exists:gsobjects,id',
            'device_name_id'    => 'required|integer|exists:device_names,id',
            'number'            => 'required|min:3|max:100',
            'last_muster_date'  => 'required|date',
            'muster_interval'   => 'required|min:1|max:2',
            'range'             => 'required|min:3|max:100',
        ];
    }
}
