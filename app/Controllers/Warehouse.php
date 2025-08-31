<?php

namespace App\Controllers;

use App\Models\WarehouseModel;

class Warehouse extends BaseController
{
    protected $warehousetmodel;


    public function __construct()
    {
        $this->warehousetmodel = new WarehouseModel();
    }

    // Tampilkan semua produk
    public function index()
    {
        $data['warehouse'] = $this->warehousetmodel->findAll();
        $data['title'] = 'Quantura | warehouse';

        return view('content/header', $data)
            . view('content/navbar')
            . view('content/sidebar')
            . view('konten/warehouse', $data)
            . view('content/footer');
    }

    // Simpan atau update produk
    public function save()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'location' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $id = $this->request->getPost('id');
        $data = [
            'name' => $this->request->getPost('name'),
            'location' => $this->request->getPost('location')
        ];

        // Simpan atau update data
        if ($id) {
            $this->warehousetmodel->update($id, $data);
        } else {
            $this->warehousetmodel->insert($data);
        }

        return redirect()->to('/warehouse');
    }

    // Hapus produk berdasarkan ID
    public function delete($id)
    {
        $this->warehousetmodel->delete($id);
        return redirect()->to('/warehouse');
    }

    // Ambil data produk untuk keperluan edit
    public function edit($id)
    {
        $warehouse = $this->warehousetmodel->find($id);
        return $this->response->setJSON($warehouse);
    }

    // Lihat detail produk (jika dibutuhkan)
    public function detail($id)
    {
        $warehouse = $this->warehousetmodel->find($id);
        if ($warehouse) {
            return $this->response->setJSON($warehouse);
        } else {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'warehouse not found']);
        }
    }
}
