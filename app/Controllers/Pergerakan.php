<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\PergerakanModel;

class Pergerakan extends BaseController
{
    protected $pergerakanmodel;
    protected $productmodel;

    public function __construct()
    {
        $this->productmodel = new ProductModel();
        $this->pergerakanmodel = new PergerakanModel();
    }

    // Tampilkan semua produk
    public function index()
    {
        $data['pergerakan'] = $this->pergerakanmodel->findAll();
        $data['product'] = $this->productmodel->findAll();


        $data['title'] = 'Quantura | Pergerakan Product';

        return view('content/header', $data)
            . view('content/navbar')
            . view('content/sidebar')
            . view('konten/pergerakan', $data)
            . view('content/footer');
    }

    // Simpan atau update produk
    public function save()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'product_id' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'reference' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $id = $this->request->getPost('id');
        $data = [
            'product_id' => $this->request->getPost('product_id'),
            'type' => $this->request->getPost('type'),
            'quantity' => $this->request->getPost('quantity'),
            'reference' => $this->request->getPost('reference'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Simpan atau update data
        if ($id) {
            $this->pergerakanmodel->update($id, $data);
        } else {
            $this->pergerakanmodel->insert($data);
        }

        return redirect()->to('/pergerakan');
    }

    // Hapus produk berdasarkan ID
    public function delete($id)
    {
        $this->productmodel->delete($id);
        return redirect()->to('/pergerakan');
    }

    // Ambil data produk untuk keperluan edit
    public function edit($id)
    {
        $pergerakan = $this->pergerakanmodel->find($id);
        return $this->response->setJSON($pergerakan);
    }

    // Lihat detail produk (jika dibutuhkan)
    public function detail($id)
    {
        $pergerakan = $this->pergerakanmodel->find($id);
        if ($pergerakan) {
            return $this->response->setJSON($pergerakan);
        } else {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Product not found']);
        }
    }
}
