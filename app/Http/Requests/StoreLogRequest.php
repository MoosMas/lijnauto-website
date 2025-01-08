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
            'level' => ['required', 'string', Rule::in(['CHECKPOINT', 'INFO', 'WARNING', 'ERROR'])],
            'message' => ['required', 'string', function ($attribute, $value, $fail) {
                $validColors = ['red', 'green', 'blue'];
                if (request()->input('level') === 'CHECKPOINT' && !in_array($value, $validColors)) {
                    $fail('Wanner log level (level) gelijk is aan CHECKPOINT, moet :attribute één van de volgende waardes zijn: ' . implode(', ', $validColors));
                }
            }],
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
            'level.required' => ':attribute is verplicht',
            'level.string' => ':attribute moet een string zijn',
            'level.in' => ':attribute moet één van de volgende waardes zijn: :values',
            'message.required' => ':attribute is verplicht',
            'message.string' => ':attribute moet een string zijn',
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
            'level' => 'Log level (level)',
            'message' => 'Log bericht (message)',
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
