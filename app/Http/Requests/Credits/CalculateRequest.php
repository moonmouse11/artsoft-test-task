<?php

declare(strict_types=1);

namespace App\Http\Requests\Credits;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

final class CalculateRequest extends FormRequest
{
    /**
     * @description Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'price' => 'required|integer|min:0',
            'initialPayment' => 'required|decimal:0,2|min:0',
            'loanTerm' => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'price' => 'Value must be positive integer',
            'initialPayment' => 'Value must be positive decimal, example 10.11',
            'loanTerm' => 'Value must be positive integer',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response: response()->json(
                data: ['errors' => $validator->errors()],
                status: 422
            )
        );
    }
}