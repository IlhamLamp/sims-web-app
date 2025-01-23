<?php

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'position' => 'nullable|string',
            'image_url' => 'nullable|string'
        ];
    }
}
