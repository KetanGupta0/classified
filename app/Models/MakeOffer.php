<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakeOffer extends Model
{
    use HasFactory;
    protected $table = "make_offers";
    protected $primaryKey = "offer_id";
}
