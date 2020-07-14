<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    // protected $fillable = [
    //     'name', 'slug', 'on_off',
    // ];
    protected $guarded=[];

    public function posts(){
    	return $this->hasMany(Post::class);
    }
}
