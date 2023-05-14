<?php

namespace App\Http\Requests\Mobile;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequestRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> ['required', 'string', 'min:3', 'max:50'],
            'phone'=> ['required', 'min:8', 'max:20'],
            'age'=> ['required', 'string'] ,
            'city_id'=> ['required', 'numeric', 'exists:cities,id'],
            'details'  => ['required', 'string', 'min:20' , 'max:200'],
            'latitude' =>['required','between:-90,90'],
            'longitude' => ['required', 'between:-180,180'],
            'blood_type_id'=> ['required', 'numeric', 'exists:blood_types,id'],
            'hospital_name'=> ['required', 'string', 'min:3', 'max:50'],
            'hospital_address'=> ['required', 'string', 'min:5', 'max:300'],
            'bags_num'=> ['required', 'integer', 'between:1,20'],
        ];
    }
}
