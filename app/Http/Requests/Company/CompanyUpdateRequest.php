<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|nullable",
            "name" => "required|string",
            "authorized" => "string|nullable",
            "email" => "email|nullable",
            "phone" => "string|nullable",
            "city_id" => "nullable|exists:cities,id",
            "district_id" => "nullable|exists:districts,id",
            "address" => "string|nullable",
            "tax_office" => "string|nullable",
            "tax_number" => "numeric|nullable",
            "description" => "string|nullable",
            "delete_image" => "boolean|nullable",
        ];
    }
}
