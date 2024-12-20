<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $role = $this->input('role');

        $emailValidation = 'required|email';        
        if ($role == 0) {
            $emailValidation .= '|unique:users,email';
        } elseif ($role == 1) {
            $emailValidation .= '|unique:admins,email';
        } elseif ($role == 2) {
            $emailValidation .= '|unique:super_admins,email';
        }
        
        return [
            'name' => 'required|string|max:255',
            'email' => $emailValidation,
            'password' => 'required|min:8|confirmed',
            'role' => 'required|integer|in:0,1,2',
        ];
    }   
}
