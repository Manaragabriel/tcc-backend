<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organization;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Teams extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id','name','slug','image','organization_id','created_at','updated_at'];

    public function organization(){
        return $this->belongsTo(Organization::class);
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
   public function members(){
        return  $this->belongsToMany(User::class,'teams_members','team_id');

   }

}
