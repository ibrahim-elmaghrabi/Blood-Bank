<?php

namespace App\Http\Requests\Mobile;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'    => ['required', 'string', 'min:3', 'max:100'],
            'email'   => ['required', 'email'],
            'phone'   => ['required', 'string', 'min:11' ,'max:20'],
            'subject' => ['required', 'string', 'min:5' , 'max:50'],
            'message' => ['required', 'string', 'min:5', 'max:500'],
        ];
    }
}
