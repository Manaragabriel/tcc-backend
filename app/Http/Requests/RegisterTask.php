<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterTask extends FormRequest
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
            'title' => 'required|max:256',
            'description' => 'required',  
            'user_id' => 'nullable|exists:users,id',      
        ];
    }
    public function messages(){
        return [
            'title.required' => 'O titulo é obrigatório',
            'description.required' => 'A descrição é obrigatório',
            'users.required' => 'É obrigatório escolher o responsavel',
        ];
    }
}
