<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCarRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'name.required' => ':attribute is verplicht',
            'name.string' => ':attribute moet een string zijn',
            'name.max' => ':attribute kan maximaal 255 tekens lang zijn',
            'description.string' => ':attribute moet een string zijn'
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'name' => 'Auto naam (name)',
            'description' => 'Beschrijving (description)'
        ];
    }

    /**
     * @param  Validator  $validator
     * @return mixed
     */
    protected function failedValidation(Validator $validator)
    {
        // Maak een aangepaste response aan met extra data
        $response = response()->json([
            'success' => false,
            'message' => 'Validatie is mislukt',
            'errors' => $validator->errors(),
        ], 422);

        // Gooi de aangepaste response als een uitzondering
        throw new HttpResponseException($response);
    }
}
