<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceModel extends Model
{
    protected $table = 'invoices ';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'invoice_number',
        'customer_id',
        'date',
        'total',
        'payment_status',
        'notes',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // public function getProductsWithCategory()
    // {
    //     return $this->db->table('invoices')
    //         ->select('invoices., customers.name as category_name')
    //         ->join('categories', 'products.category_id = categories.id')
    //         ->get()
    //         ->getResultArray();
    // }

    public function getEnumValues($table, $column)
    {
        $query = $this->db->query("
        SELECT COLUMN_TYPE 
        FROM information_schema.COLUMNS 
        WHERE TABLE_SCHEMA = 'quantura'
          AND TABLE_NAME = 'invoices'
          AND COLUMN_NAME = 'payment_status';
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

    // public function getProduct()
    // {
    //     return $this->db->table('stock_movements')
    //         ->select('stock_movements.*, products.name as product_name')
    //         ->join('products AS products', 'products.name = stock_movements.product_id')
    //         ->get()
    //         ->getResultArray();
    // }
}
