<?php

namespace App\Http\Requests\Web\Auth;

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
        return $this->isMethod('POST') ? $this->sendEmail() : $this->resetPassword() ;
    }

    public function sendEmail()
    {
        return [
            'email' => ['required', 'email', 'exists:clients,email']
        ];
    }

    public function resetPassword()
    {
        return [
            'pin_code' => ['required'],
            'password' => ['required', 'confirmed'],
        ];
    }
}
