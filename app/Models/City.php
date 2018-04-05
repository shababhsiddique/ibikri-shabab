<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primaryKey = "city_id";
    protected $table = 'cities';
    
    public function Division(){
        
        return $this->hasOne('App\Models\Division', 'division_id', 'division_id');
    }
}
