<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfile extends FormRequest
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
            'phone' => 'required|unique:users,phone,'.$this->id,
            'cpf' => 'required|unique:users,cpf,'.$this->id,
        ];
    }
    public function messages(){
        return [
            'name.required' => 'O nome é obrigatório',
            'phone.required' => 'O telefone é obrigatório',
            'phone.unique' => 'Este telefone já esta cadastrado',
            'cpf.required' => 'A senha é obrigatória',
            'cpf.unique' => 'Este CPF já esta cadastrado',


        ];
    }
}
