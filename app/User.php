<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function City() {
        //Each user has a city
        return $this->hasOne('App\Models\City', 'city_id', 'city_id');
    }

    public function isOnline() {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function countNotification() {
        
        $unreadNotifications = \App\Models\Message::where('receiver_id',$this->id)
                ->where('read_status', 0)
                ->count();

        return $unreadNotifications;
    }

}
