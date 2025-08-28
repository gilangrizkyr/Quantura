<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Product extends BaseController
{
    protected $productmodel;
    protected $categorymodel;

    public function __construct()
    {
        $this->productmodel = new ProductModel();
        $this->categorymodel = new CategoryModel();
    }

    // Tampilkan semua produk
    public function index()
    {
        $data['products'] = $this->productmodel->findAll();
        $data['title'] = 'Quantura | Product';

        return view('content/header', $data)
            . view('content/navbar')
            . view('content/sidebar')
            . view('konten/product', $data)
            . view('content/footer');
    }

    // Simpan atau update produk
    public function save()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'sku' => 'required',
            'category' => 'required',
            'unit' => 'required',
            'cost_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'stock' => 'required|integer',
            'warehouse' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $id = $this->request->getPost('id');
        $data = [
            'name' => $this->request->getPost('name'),
            'sku' => $this->request->getPost('sku'),
            'category' => $this->request->getPost('category'),
            'unit' => $this->request->getPost('unit'),
            'cost_price' => $this->request->getPost('cost_price'),
            'selling_price' => $this->request->getPost('selling_price'),
            'stock' => $this->request->getPost('stock'),
            'warehouse' => $this->request->getPost('warehouse'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Simpan atau update data
        if ($id) {
            $this->productmodel->update($id, $data);
        } else {
            $this->productmodel->insert($data);
        }

        return redirect()->to('/product');
    }

    // Hapus produk berdasarkan ID
    public function delete($id)
    {
        $this->productmodel->delete($id);
        return redirect()->to('/product');
    }

    // Ambil data produk untuk keperluan edit
    public function edit($id)
    {
        $product = $this->productmodel->find($id);
        return $this->response->setJSON($product);
    }

    // Lihat detail produk (jika dibutuhkan)
    public function detail($id)
    {
        $product = $this->productmodel->find($id);
        if ($product) {
            return $this->response->setJSON($product);
        } else {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Product not found']);
        }
    }
}
