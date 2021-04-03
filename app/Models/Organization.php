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
        $value = $value ? $value : $this->name;
        $slug = Str::slug($value);
        $verify_slug = self::where('slug',$slug)->get();
        if(count($verify_slug) > 0){
            $slug .= '-'.( count($verify_slug) + 1 );
        }
        $this->slug = $slug;
   }
}
