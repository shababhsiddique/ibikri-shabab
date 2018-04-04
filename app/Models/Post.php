<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = "post_id";
    protected $table = 'posts';
    
    public function Postimages()
    {
        //Each product has many batches
        return $this->hasMany('App\Models\Postimage', 'post_id', 'post_id');
    }
    
    public function Subcategory(){
        return $this->hasOne('App\Models\Subcategory', 'subcategory_id', 'subcategory_id');
    }
    
    public function User(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    
    protected static function boot() {
        parent::boot();

        static::deleting(function($post) { // before delete() method call this
            
            $post->Postimages()->delete();
             // do the rest of the cleanup...
        });
    }
    
    
}
