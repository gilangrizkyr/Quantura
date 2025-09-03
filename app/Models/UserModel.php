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
        'profile_image',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField = 'updated_at';

    protected $returnType = 'array';

    // public function getUserByUsername(string $username)
    // {
    //     return $this->where('username', $username)->first();
    // }

    public function getEnumValues($table, $column)
    {
        $query = $this->db->query("
        SELECT COLUMN_TYPE 
        FROM information_schema.COLUMNS 
        WHERE TABLE_SCHEMA = 'quantura'
          AND TABLE_NAME = 'users'
          AND COLUMN_NAME = 'role';
    ", [$table, $column]);

        $row = $query->getRow();

        if (!$row) return [];

        // Extract enum values dari string enum('admin','kasir',...)
        $type = $row->COLUMN_TYPE;

        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);

        if (!isset($matches[1])) return [];

        $values = explode("','", $matches[1]);

        return $values;
    }
}
