<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:200'],
            'model' => ['required', 'string', 'max:200'],
            'category_id' => ['required', 'uuid'],
            'price' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'images' => ['nullable', 'array']
        ];
    }

    public function validated($key = null, $default = null): array
    {
        $data = parent::validated($key = null, $default = null);

        if ($this->hasFile('images')) {
            $imagesArray = $this->images;
            foreach ($imagesArray as $imageFile) {
                $data['image_array'][] = fileUploader($imageFile, 'product_images');
            }
        } else {
            unset($data['images']);
        }
        return $data;
    }
}
