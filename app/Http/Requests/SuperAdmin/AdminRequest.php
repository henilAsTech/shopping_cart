<?php

namespace App\Http\Requests\SuperAdmin;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('super_admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $unique = $this->admin ? Rule::unique(Admin::class)->ignore($this->admin->id) : Rule::unique(Admin::class);
        
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:200', $unique],
            'password' => [$this->admin ? 'nullable' : 'required', 'min:8', 'confirmed', Password::defaults()],
        ];
    }

    public function validated($key = null, $default = null): array
    {
        $data = parent::validated($key = null, $default = null);
        if (!isset($data['password'])) {
            unset($data['password']);
        }
        return $data;
    }
}
