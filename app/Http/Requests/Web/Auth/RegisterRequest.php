<?php

namespace App\Http\Requests\Web\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=> ['required', 'string', 'min:3', 'max:200'],
            'email'=> ['required', 'email|unique:clients,email'],
            'phone'=> ['required', 'unique:clients,phone'],
            'd_o_b'=> ['required', 'date'],
            'blood_type_id'=> ['required', 'numeric', 'exists:blood_types,id'] ,
            'city_id' => ['required', 'numeric', 'exists:cities,id'],
            'last_donation_date' => ['required', 'date'],
            'password'=> ['required', 'confirmed'],
        ];
    }
}
