<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|min:3|max:10000',
            'photo' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'nome é obrigatório',
            'name.min' => 'ops! precisa informar pelo menos 3 caracteres',
            'photo.required' => 'ops! precisa escolher uma imagem',
            'description.min' => 'ops! descrição precisa informar pelo menos 3 caracteres',
        ];
    }
}
