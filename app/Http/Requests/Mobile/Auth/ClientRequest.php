<?php

namespace App\Http\Requests\Mobile\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
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
                'name'=> ['required','string' , 'max:255'] ,
                'email'=> ['required','email','unique:users,email'],
                'phone'=> ['required','min:11', 'max:20'. 'unique:clients,phone'] ,
                'd_o_b' => ['required', 'date_format:Y-m-d'],
                'blood_type_id' => ['required', 'numeric', 'exists:blood_types,id'] ,
                'city_id' => ['required', 'numeric', 'exists:cities,id'],
                'last_donation_date' => ['required', 'date_format:Y-m-d'] ,

            ];
    }
}
