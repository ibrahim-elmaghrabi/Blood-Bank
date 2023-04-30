<?php

namespace App\Http\Requests\Mobile\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
        return $this->isMethod('POST') ? $this->forgetPassword() : $this->setPassword();
    }

    public function forgetPassword()
    {
        return [
            'phone'=> ['required', 'min:8', 'max:20', 'exists:clients,phone']
        ];
    }

    public function setPassword()
    {
        return [
            'pin_code' => ['required'],
            'password' => ['required', 'confirmed']
        ];
    }
}
