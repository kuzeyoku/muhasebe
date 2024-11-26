<?php

namespace App\Http\Requests\Debit;

use Illuminate\Foundation\Http\FormRequest;

class DebitUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "required|string",
            "amount" => "required|numeric",
            "due_date" => "required|date",
            "description" => "nullable|string",
        ];
    }
}
