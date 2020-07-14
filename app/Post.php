<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   // protected $fillable = [
   //      'Title', 
   //      'Slug', 
   //      'Keyword',
   //      'Description',
   //      'Content',
   //      'Image',
   //      'On_Off',
   //      'RelatedPost',
   //      'Category_Id',
   //      'User_Id',
   //      'NewPost',
   //      'View',
   //  ];
	protected $guarded=[];
    
    public function categories(){
    	return $this->belongsTo(Category::class);
    }
    public function users(){
      return $this->belongsTo(User::class);
    }
    
}
