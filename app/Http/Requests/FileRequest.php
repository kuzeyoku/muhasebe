<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
            "files" => "required",
            "files.*" => "file|mimes:png,jpg,jpeg,gif,pdf,doc,docx,xls,xlsx,ppt,pptx,txt,zip,rar"
        ];
    }
}
