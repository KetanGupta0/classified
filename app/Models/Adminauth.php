<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminauth extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "adminauths";
    protected $primaryKey = "admin_id";
}
