<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationsMembers extends Model
{
    use HasFactory;

    protected $fillable = ['id','organization_id','user_id','type'];
    protected $attributes = [
        'type' => 0
    ];
}

