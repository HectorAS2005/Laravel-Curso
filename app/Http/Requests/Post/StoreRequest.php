<?php

namespace App\Http\Requests\Post;

use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            $response = new Response($validator->errors(), 422);
            throw new ValidationException($validator, $response );
        }
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:255',
            'slug' => 'required|min:5|max:255|unique:posts',
            'content' => 'required|min:7',
            'category_id' => 'required|integer',
            'description' => 'nullable|min:7',
            'posted' => 'required',
        ];
    }
}
