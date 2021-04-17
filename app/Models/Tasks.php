<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Projects;
class Tasks extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title','description','project_id','user_id', 'status'];
    protected $attributes = [
        'status' => 1
    ];

    public function project(){
        return  $this->belongsTo(Projects::class);
    }
}
