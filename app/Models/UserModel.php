<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'username',
        'password',
        'role',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';

    protected $returnType = 'array';

    // public function getUserByUsername(string $username)
    // {
    //     return $this->where('username', $username)->first();
    // }
}
