<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationsMembersInvites extends Model
{
    use HasFactory;

    protected $fillable = ['id','organization_id','user_id','accepted'];
}

