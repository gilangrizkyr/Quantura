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

    public function getProductsWithCategory()
    {
        return $this->db->table('stock_movements')
            ->select('stock_movements.*, product.name as product_name')
            ->join('products', 'stock_movements.product_id = product_id')
            ->get()
            ->getResultArray();
    }
}
