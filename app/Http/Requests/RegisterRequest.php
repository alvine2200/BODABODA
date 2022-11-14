<?php

namespace App\Http\Requests;

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
            'fullname' => 'required|string|min:5|max:15',
            'username' => 'required|string|min:5|regex:/(^([a-zA-z]+)(\d+)?$)/u',
            'id_number' => 'required|min:8|max:9',
            'county' => 'required|string|max:15',
            'subcounty' => 'required|string|max:15',
            'location' => 'required|string|max:15',
            'district' => 'required|string|max:15',
            'village' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|min:10|max:16|unique:users,phone',
            'password' => 'required|confirmed|min:6',
        ];
    }
}
