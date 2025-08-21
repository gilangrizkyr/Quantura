<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatLogModel extends Model
{
    protected $table = 'ai_logs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_input', 'ai_response', 'action_type', 'created_at'];
    protected $useTimestamps = false; // karena kamu sudah punya created_at default timestamp
}
