<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    protected $table = 'memberships';
    protected $primaryKey = 'mid';
    protected $fillable = ['m_plan','m_price','m_days','m_desc'];
}
