<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointsHistory extends Model
{
    use HasFactory;
    protected $table = 'points_histories';
    protected $primaryKey = 'ph_id';
    protected $fillable = ['user_id','points_from','points_to','total_points'];
}
