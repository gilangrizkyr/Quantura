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
        'reference'
    ];

    // Auto timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPergerakan()
    {
        return $this->db->table('stock_movements')
            ->select('stock_movements.*, products.name as product_name')
            ->join('products', 'stock_movements.product_id = products.id', 'left')
            ->get()
            ->getResultArray();
    }


    // public function getProductsWithCategoryAndWarehouse()
    // {
    //     return $this->db->table('products')
    //         ->select('products.*, categories.name as category_name, warehouses.name as warehouse_name')
    //         ->join('categories', 'products.category_id = categories.id', 'left')
    //         ->join('warehouses', 'products.warehouse_id = warehouses.id', 'left')
    //         ->get()
    //         ->getResultArray();
    // }

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
