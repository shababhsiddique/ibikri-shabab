<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $primaryKey = "subcategory_id";
    protected $table = 'subcategories';
    
    public function Category(){
        
        return $this->hasOne('App\Models\Category', 'category_id', 'parent_category_id');
    }
}
