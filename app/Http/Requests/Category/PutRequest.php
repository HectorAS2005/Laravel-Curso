<?php

namespace App\Http\Requests\Category;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Validation\ValidationException;

class PutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:255',
            'slug' => 'required|min:5|max:255|unique:categories,slug,'.$this->route('category')->id,
        ];
    }

    function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            $response = new Response($validator->errors(), 422);
            throw new ValidationException($validator, $response);
        }
    }
}
