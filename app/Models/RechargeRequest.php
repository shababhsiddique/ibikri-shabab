<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RechargeRequest extends Model
{
    protected $primaryKey = "recharge_request_id";
    protected $table = 'recharge_requests';
}
