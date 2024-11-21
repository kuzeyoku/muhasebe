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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "image" => ["image", "mimes:jpeg,png,jpg,gif,svg"],
            "name" => ["required", "string"],
            "authorized" => ["string", "nullable"],
            "email" => ["email"],
            "phone" => ["string"],
            "city_id" => ["integer"],
            "district_id" => ["integer"],
            "address" => ["string"],
            "tax_office" => ["string"],
            "tax_number" => ["numeric"],
            "description" => ["string"],
        ];
    }
}
