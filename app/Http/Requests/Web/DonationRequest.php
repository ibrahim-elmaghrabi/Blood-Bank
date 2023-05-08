<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:200'],
            'phone' => ['required', 'string', 'max:20'],
            'age' => ['required', 'numeric'],
            'city_id' => ['required', 'numeric', 'exists:cities,id'],
            'details' => ['required', 'string', 'min:5', 'max:700'],
            'blood_type_id' => ['required', 'numeric', 'exists:blood_types,id'],
            'hospital_name' => ['required', 'string', 'min:3', 'max:50'],
            'hospital_address' => ['required', 'string', 'max:700'],
            'bags_num' => ['required'],
        ];
    }
}
