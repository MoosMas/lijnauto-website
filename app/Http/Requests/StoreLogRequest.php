<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreLogRequest extends FormRequest
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
            'car_id' => 'required|integer|exists:\App\Models\Car,id',
            'checkpoint_color' => ['required', 'string', Rule::in(['red', 'blue'])],
            'timestamp' => 'required|integer'
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'car_id.required' => ':attribute is verplicht',
            'car_id.integer' => ':attribute moet een getal zijn',
            'car_id.exists' => ':attribute bestaat niet',
            'checkpoint_color.required' => ':attribute is verplicht',
            'checkpoint_color.string' => ':attribute moet een string zijn',
            'checkpoint_color.in' => ':attribute is ongeldig',
            'timestamp.required' => ':attribute is verplicht',
            'timestamp.integer' => ':attribute moet een getal zijn'
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'car_id' => 'Auto ID (car_id)',
            'checkpoint_color' => 'Checkpoint kleur (checkpoint_color)',
            'timestamp' => 'Timestamp (timestamp)'            
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
