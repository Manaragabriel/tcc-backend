<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
class Organization extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','image','slug','cnpj','description','user_id'];
    
    public function user(){
        return  $this->hasOne(User::class);
    }

    public function setSlug($value = null){
        $value = $value ? $value : $this->title;
        $this->slug =  Str::slug($value);
   }
}
