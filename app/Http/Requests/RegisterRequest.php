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
            'fullname'=> 'required|string|min:5|max:30',
            'username'=> 'required|string|regex:/(^([a-zA-z]+)(\d+)?$)/u',
            'id_number'=> 'required|string',
            'county'=> 'required|string',
            'subcounty'=> 'required|string',
            'location'=> 'required|string',
            'district'=> 'required|string',
            'village'=> 'required|string',
            'email'=> 'required|email|unique:users,email',
            'phone'=> 'required|string|min:10',
            'password'=> 'required|confirmed|min:6',
        ];
    }
}
