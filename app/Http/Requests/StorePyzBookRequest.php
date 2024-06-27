<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePyzBookRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'publication_date' => 'sometimes|required|date_format:Y-m-d H:i:s',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The book name is required.',
            'name.string' => 'The book name must be a string.',
            'name.max' => 'The book name may not be greater than 255 characters.',
            'description.required' => 'The description is required.',
            'description.string' => 'The description must be a string.',
            'publication_date.required' => 'The publication date is required.',
            'publication_date.date_format' => 'The publication date must be in the format Y-m-d H:i:s.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = [
            'status' => false,
            'message' => $validator->errors()->first(),
            'data' => $validator->errors(),
        ];
        throw new HttpResponseException(response()->json($response, 422));
    }
}
