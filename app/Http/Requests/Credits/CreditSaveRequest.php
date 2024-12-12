<?php

declare(strict_types=1);

namespace App\Http\Requests\Credits;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

final class CreditSaveRequest extends FormRequest
{
    /**
     * @description Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'carId' => 'required|integer|min:0',
            'programId' => 'required|integer|min:0',
            'initialPayment' => 'required|integer|min:0',
            'loanTerm' => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'carId' => 'Value must be positive integer',
            'programId' => 'Value must be positive integer',
            'initialPayment' => 'Value must be positive integer',
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