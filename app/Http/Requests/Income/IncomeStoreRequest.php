<?php

namespace App\Http\Requests\Income;

use Illuminate\Foundation\Http\FormRequest;

class IncomeStoreRequest extends FormRequest
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
            "file" => "nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,xls,xlsx",
            "company_id" => "nullable|exists:companies,id",
            "licence_id" => "nullable|exists:licences,id",
            "type" => "required",
            "amount" => "required|numeric",
            "date" => "required|date",
            "description" => "nullable|string",
        ];
    }
}