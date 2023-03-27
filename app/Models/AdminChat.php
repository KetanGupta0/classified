<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminChat extends Model
{
    use HasFactory;
    protected $primaryKey = 'chat_id';
    protected $table = 'admin_chats';
}
