<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class post extends Model
{
    use HasFactory;



    protected $fillable=['title','description','user_id','slug'];




    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable():array
    {
       return[ 'slug'=>['source'=>'title']];
    }
}
