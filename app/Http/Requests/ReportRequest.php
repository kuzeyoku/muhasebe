<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            "company_id" => "nullable|exists:companies,id",
            "licence" => "nullable|exists:licences,id",
            "type" => "nullable|string",
            "start_date" => "nullable|date",
            "end_date" => "nullable|date",
        ];
    }
}
