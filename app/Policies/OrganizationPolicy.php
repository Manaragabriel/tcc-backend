<?php

namespace App\Policies;

use App\Models\Organization;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
class OrganizationPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Organization $organization)
    {
        
        return $user->id === $organization->user_id;
    }

    public function delete(User $user, Organization $organization)
    {
        
        return $user->id === $organization->user_id;
    }
}
