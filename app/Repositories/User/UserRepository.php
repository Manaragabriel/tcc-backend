<?php 
namespace App\Repositories\User;
use App\Models\User;

class UserRepository implements IUserRepository{
    
    private $userModel;

    public function __construct(User $userModel){
        $this->userModel = $userModel;
    }

    public function updateUser($user, $olduser){
        $olduser->update($user);
        return true;
    }



}

