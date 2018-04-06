<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourites extends Model
{
    private $primary_key = 'fav_id';
    
    public function Post(){
        
        return $this->hasOne('App\Models\Post', 'post_id', 'post_id');
    }
}
