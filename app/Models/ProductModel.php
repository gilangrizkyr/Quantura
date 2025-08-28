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
        'category',         // foreign key to categories
        'unit',
        'cost_price',
        'selling_price',
        'stock',
        'warehouse',        // foreign key to warehouse
    ];

    // Auto timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
