<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AboutUsRequest extends FormRequest
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
            'contents' => 'required|array',
            'contents.*.id' => 'required|exists:contents,id',
            'contents.*.name' => 'required|string|max:255',
            'contents.*.content_type' => 'required|in:image,text,video',
            'contents.*.content_value' => 'required|string',
            'contents.*.medias' => 'required_if:contents.*.content_type,image|array',
            'contents.*.medias.*.id' => 'exists:medias,id',
            'contents.*.medias.*.media_name' => 'required_with:contents.*.medias|string|max:255',
            'contents.*.medias.*.path' => 'required_with:contents.*.medias|string',
            'contents.*.medias.*.type' => 'required_with:contents.*.medias|in:jpeg,png,svg,jpg',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => $errors
        ], 422));
    }
}
