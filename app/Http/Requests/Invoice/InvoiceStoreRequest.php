<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceStoreRequest extends FormRequest
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
            "file" => "nullable|file",
            'number' => 'required|string|unique:invoices,number',
            'company_id' => 'nullable|exists:companies,id',
            'licence_id' => 'nullable|exists:licences,id',
            "type" => "required|string",
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'due_date' => 'nullable|date',
            'status' => 'nullable|string',
            "description" => "nullable|string",
        ];
    }
}
