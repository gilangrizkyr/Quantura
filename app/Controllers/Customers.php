<?php

namespace App\Controllers;

use App\Models\CustomersModel;

class Customers extends BaseController
{
    protected $customersmodel;


    public function __construct()
    {
        $this->customersmodel = new CustomersModel();
    }

    // Tampilkan semua produk
    public function index()
    {
        $data['customers'] = $this->customersmodel->findAll();
        $data['title'] = 'Quantura | Pelanggan';

        return view('content/header', $data)
            . view('content/navbar')
            . view('content/sidebar')
            . view('konten/customers', $data)
            . view('content/footer');
    }

    // Simpan atau update produk
    public function save()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $id = $this->request->getPost('id');
        $data = [
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('address')
        ];

        // Simpan atau update data
        if ($id) {
            $this->customersmodel->update($id, $data);
        } else {
            $this->customersmodel->insert($data);
        }

        return redirect()->to('/customers');
    }

    // Hapus produk berdasarkan ID
    public function delete($id)
    {
        $this->customersmodel->delete($id);
        return redirect()->to('/customers');
    }

    // Ambil data produk untuk keperluan edit
    public function edit($id)
    {
        $customers = $this->customersmodel->find($id);
        return $this->response->setJSON($customers);
    }

    // Lihat detail produk (jika dibutuhkan)
    public function detail($id)
    {
        $customers = $this->customersmodel->find($id);
        if ($customers) {
            return $this->response->setJSON($customers);
        } else {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'customers not found']);
        }
    }
}
