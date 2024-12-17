<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceUpdateRequest extends FormRequest
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
            'number' => 'required|string',
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

    public function attributes(): array
    {
        return [
            "file" => "Fatura Dosyası",
            'number' => 'Fatura Numarası',
            'company_id' => 'Firma',
            'licence_id' => 'Ruhsat',
            "type" => "Fatura Türü",
            "amount" => "Fatura Tutarı",
            "date" => "Fatura Tarihi",
            "due_date" => "Son Ödeme Tarihi",
            "status" => "Durum",
            "description" => "Açıklama",
        ];
    }
}
