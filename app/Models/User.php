<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Organization;
use App\Models\Teams;
use App\Models\OrganizationsMembers;
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'phone',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function organizations(){
        return  $this->hasMany(Organization::class);
    }

    public function organizations_member(){
        return $this->belongsToMany(Organization::class, 'organizations_members');
    }
    public function teams_members(){
        return $this->belongsToMany(Teams::class, 'teams_members');
    }
}
