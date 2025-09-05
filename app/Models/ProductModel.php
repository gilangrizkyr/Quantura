<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'sku',
        'category_id',
        'unit',
        'cost_price',
        'selling_price',
        'stock',
        'warehouse_id',
    ];

    // Auto timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getProductsWithCategory()
    {
        return $this->db->table('products')
            ->select('products.*, categories.name as category_name')
            ->join('categories', 'products.category_id = categories.id')
            ->get()
            ->getResultArray();
    }
}
