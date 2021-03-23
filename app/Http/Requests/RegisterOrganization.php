<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterOrganization extends FormRequest
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
            'name' => 'required|max:256',      
            'cnpj' => 'required|unique:organizations',
            'description' => 'required',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'O nome é obrigatório',
            'description.required' => 'Descrição é obrigatória',
            'cnpj.required' => 'O CNPJ é obrigatório',
            'cnpj.unique' => 'Esse CNPJ já está cadastrado',


        ];
    }
}
