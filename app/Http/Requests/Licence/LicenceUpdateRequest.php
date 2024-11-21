<?php

namespace App\Http\Requests\Licence;

use Illuminate\Foundation\Http\FormRequest;

class LicenceUpdateRequest extends FormRequest
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
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg",
            "number" => "required|integer",
            "access_number" => "nullable|integer",
            "group" => "nullable|string",
            "type" => "nullable|string",
            "company_id" => "nullable|exists:companies,id",
            "city_id" => "nullable|exists:cities,id",
            "district_id" => "nullable|exists:districts,id",
            "start_date" => "nullable|date",
            "end_date" => "nullable|date",
        ];
    }
}
