<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Product extends BaseController
{
    protected $categorytmodel;


    public function __construct()
    {
        $this->categorymodel = new CategoryModel();
    }

    // Tampilkan semua produk
    public function index()
    {
        $data['category'] = $this->categorymodel->findAll();
        $data['title'] = 'Quantura | Category';

        return view('content/header', $data)
            . view('content/navbar')
            . view('content/sidebar')
            . view('konten/category', $data)
            . view('content/footer');
    }

    // Simpan atau update produk
    public function save()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $id = $this->request->getPost('id');
        $data = [
            'name' => $this->request->getPost('name')
        ];

        // Simpan atau update data
        if ($id) {
            $this->categorymodel->update($id, $data);
        } else {
            $this->categorymodel->insert($data);
        }

        return redirect()->to('/category');
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
