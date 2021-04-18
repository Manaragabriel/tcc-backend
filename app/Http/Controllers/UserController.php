<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditProfile;
use App\Repositories\User\IUserRepository;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    private $userRepository;

    public function __construct(IUserRepository $userRepository){
        $this->userRepository = $userRepository;
    }
    public function settings(){
        $data['user'] = auth()->user();
        return $this->view_default('system/users/settings',$data);

    }

    public function update_settings(EditProfile $request){
        try{
            $user = auth()->user();
            $validUser = $request->validated();
          
            if($request->hasFile('avatar')){
                $file_name = $request->file('avatar')->getClientOriginalName();
                $file_path = 'public/users/'.$file_name;
                Storage::disk('local')->put($file_path, file_get_contents($request->file('avatar')));
                Storage::disk('local')->delete('public/users/'.$user['avatar']);
                $validUser['avatar'] = $file_name;
                
            }
            $this->userRepository->updateUser($validUser,$user);
            return redirect('painel/configuracoes');
        }catch(\Exception $e){
            $this->generate_log($e->getMessage());
        }

    }
}
