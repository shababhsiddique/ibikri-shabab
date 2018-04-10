<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    protected $primaryKey = 'featured_id';
    
    protected $table = 'featureds';
    
    public function Post(){
        
        return $this->hasOne('App\Models\Post', 'post_id', 'post_id');
    }
}
