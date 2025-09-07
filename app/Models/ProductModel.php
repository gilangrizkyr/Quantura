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

    // public function getProduct()
    // {
    //     return $this->db->table('stock_movements')
    //         ->select('stock_movements.*, products.name as product_name')
    //         ->join('products AS products', 'products.name = stock_movements.product_id')
    //         ->get()
    //         ->getResultArray();
    // }
}
