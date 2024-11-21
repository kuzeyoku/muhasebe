<?php

namespace App\Http\Requests\Contract;

use Illuminate\Foundation\Http\FormRequest;

class ContractUpdateRequest extends FormRequest
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
            "file" => "file|multiple|nullable|mimes:jpeg,png,jpg,gif,pdf,doc,docx,xls,xlsx",
            "title" => "required|string",
            "company_id" => "required|exists:companies,id",
            "license_id" => "nullable|exists:licenses,id",
            "start_date" => "nullable|date",
            "end_date" => "nullable|date",
            "description" => "nullable|string",
        ];
    }
}
