<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeemRequest extends Model
{
    use HasFactory;
    protected $table = 'redeem_requests';
    protected $primaryKey = 'id';
}
