<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Admin\PostController;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return PostController::$postValidationRules;
    }

    public function messages()
    {
        return [
            "title.required" => "Il titolo è obbligatorio.",
            "title.min" => "Il titolo è troppo breve",
            "content.required" => "Il contenuto è obbligatorio",
            "content.min" => "Il contenuto è troppo breve"
        ];
    }
    
}
