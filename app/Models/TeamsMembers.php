<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamsMembers extends Model
{
    use HasFactory;
    protected $fillable = ['teams_id','user_id'];
}
