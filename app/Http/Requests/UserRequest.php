<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string',  'regex:/^[a-zA-Z ]+$/'],
            'username' => ['required', 'string', Rule::unique('users')->ignore(Auth::user()->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'gender' => ['required'],
            'dob' => ['required'],
            'phone' => ['required', 'digits:10'],
            'address' => ['required'],
            'city' => ['required'],
            'pincode' => ['required', 'digits:6'],
            'profile_image' => ['mimes:jpeg, jpg, png'],
        ];
    }
}
