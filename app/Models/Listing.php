<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    // protected $fillable = ['title','company','location','website','email','description','tags'];
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters ["tag"] ?? false){
            $query->where("tags","like","%".request('tag').'%');
        }

        if($filters ["search"] ?? false){
            $query->where("title","like","%".request('search').'%')
            ->orwhere("description","like","%".request('search').'%')
            ->orwhere("tags","like","%".request('search').'%');
        }
    }

    //Relationship to User
    public function user(){
        return $this->belongsTo(user::class, 'user_id');
    }
}
