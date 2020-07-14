<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giaodien extends Model
{
    //
    protected $guarded=[];

    public function users(){
    	return $this->belongsTo(User::class);
    }
}
