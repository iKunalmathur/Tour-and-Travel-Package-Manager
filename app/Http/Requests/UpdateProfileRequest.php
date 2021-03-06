<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user()->id),],
            'role' => ['required'],
            'avatar' => ['file', 'mimes:jpg,png', 'max:1024'],
            'password' => ['nullable', 'required_with:password_confirmation', 'string', 'confirmed'],
            'current_password' => ['required']
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        // checks user current password
        // before making changes
        $validator->after(function ($validator) {
            if (!Hash::check($this->current_password, $this->user()->password)) {
                $validator->errors()->add('current_password', 'Your current password is incorrect.');
            }
        });
        return;
    }
}
