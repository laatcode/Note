<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNoteRequest extends FormRequest
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
        return [
            "title" => "required",
            "text" => "required",
        ];
    }

    public function messages(){
      return [
        "title.required" => "El campo Título es obligatorio",
        "text.required" => "El campo Texto de la nota es obligatorio",
      ];
    }
}
