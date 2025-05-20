<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
        return [
            ' image' => 'nullable|mimes:png,jpg',
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
        ];
    }
    public function attributes(): array
    {
        return [
            'category_id' => 'category',
        ];
    }
}
