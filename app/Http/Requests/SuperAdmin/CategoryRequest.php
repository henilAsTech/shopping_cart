<?php

namespace App\Http\Requests\SuperAdmin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $unique = $this->category ? Rule::unique(Category::class)->ignore($this->category->id) : Rule::unique(Category::class);
        return [
            'name' => ['required', 'string', 'max:200', $unique], 
        ];
    }
}
