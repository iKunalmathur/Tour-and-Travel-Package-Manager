<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            "name" => ['required', 'max:255'],
            "category_id" => ['required'],
            "price" => ['nullable', 'regex:/^\d+(\.\d{1,2})?$/'],
            "image_local" => ['file', 'mimes:jpg,png', 'max:1024'],
        ];
    }
}
