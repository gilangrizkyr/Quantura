<?php

namespace App\Models;

use CodeIgniter\Model;

class PergerakanModel extends Model
{
    protected $table = 'stock_movements';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'product_id',
        'type',
        'quantity',
        'reference',
        'created_at',
        'updated_at',
    ];

    // Auto timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPergerakan()
    {
        return $this->db->table('stock_movements')
            ->select('stock_movements.*, products.name as product_name')
            ->join('products AS products', 'products.name = stock_movements.product_id')
            ->get()
            ->getResultArray();
    }

    public function getEnumPergerakan($table, $column)
    {
        $query = $this->db->query("
        SELECT COLUMN_TYPE 
        FROM information_schema.COLUMNS 
        WHERE TABLE_SCHEMA = 'quantura'
          AND TABLE_NAME = 'stock_movements'
          AND COLUMN_NAME = 'type';
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
