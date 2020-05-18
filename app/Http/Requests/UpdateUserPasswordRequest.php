<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => 'string|min:8|required_with:password',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (! Hash::check($this->current_password, Auth::user()->password)) {
                // The provided password does not match the current
                $validator->errors()
                    ->add('current_password', 'Your current password does not match the password you provided. Please try again.');
            }

            if (strcmp($this->current_password, $this->password) === 0) {
                // The new password is the same as the current password
                $validator->errors()
                    ->add('password', 'The new password cannot be same as your current password. Please choose a different password.');
            }
        });
    }
}
