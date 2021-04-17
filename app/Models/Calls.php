<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Calls extends Model
{
    use HasFactory; 
    use SoftDeletes;
    protected $fillable = ['title','description','organization_id','user_id', 'type','status'];

    protected $attributes = [
        'status' => 1,
    ];
}
