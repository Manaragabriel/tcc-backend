<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class LoginForm extends Component
{
    public $email = '';
    public $password = '';
    public $errorMessage = '';
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6'
    ];

    public function login(){
        $this->validate();
        $user = User::where('email', $this->email)->first();

        if(!empty($user)){
            if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
                return redirect('painel');
            }
            $this->errorMessage = 'Senha incorreta';
        }else{
            $this->errorMessage = 'E-mail não encontrado';

        }
    }
    public function render()
    {
        return view('livewire.login-form');
    }
}
 