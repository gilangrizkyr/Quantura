<?php

namespace App\Controllers;

use App\Models\InvoiceModel;
use App\Models\CustomersModel;

class Invoice extends BaseController
{
    protected $invoicemodel;
    protected $customersmodel;

    public function __construct()
    {
        $this->invoicemodel = new InvoiceModel();
        $this->customersmodel = new CustomersModel();
    }

    // Tampilkan semua produk
    public function index()
    {
        $data['invoice'] = $this->invoicemodel->findAll();

        $data['title'] = 'Quantura | Invoices';

        return view('content/header', $data)
            . view('content/navbar')
            . view('content/sidebar')
            . view('konten/invoice', $data)
            . view('content/footer');
    }

    // Simpan atau update produk
    public function save()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'invoice_number' => 'required',
            'customers_id' => 'required',
            'date' => 'required',
            'total' => 'required',
            'payment_status' => 'required',
            'notes' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $id = $this->request->getPost('id');
        $customersmodel = $this->request->getPost('customer_id');

        // Cek apakah product_id ada di tabel products
        $product = $this->customersmodel->find($customersmodel);
        if (!$product) {
            return redirect()->back()->withInput()->with('error', 'Produk dengan ID ' . $customersmodel . ' tidak ditemukan!');
        }

        $data = [
            'customer_id' => $customersmodel,
            'invoice_number' => $this->request->getPost('invoice_number'),
            'date' => $this->request->getPost('date'),
            'total' => $this->request->getPost('total'),
            'payment_status' => $this->request->getPost('payment_status'),
            'notes' => $this->request->getPost('notes')
        ];


        // Simpan atau update data
        if ($id) {
            $this->invoicemodel->update($id, $data);
        } else {
            $this->invoicemodel->insert($data);
        }

        return redirect()->to('/invoice');
    }

    // Hapus produk berdasarkan ID
    public function delete($id)
    {
        $this->invoicemodel->delete($id);
        return redirect()->to('/invoice');
    }

    // Ambil data produk untuk keperluan edit
    public function edit($id)
    {
        $invoice = $this->invoicemodel->find($id);
        return $this->response->setJSON($invoice);
    }

    // Lihat detail produk (jika dibutuhkan)
    public function detail($id)
    {
        $invoice = $this->invoicemodel->find($id);
        if ($invoice) {
            return $this->response->setJSON($invoice);
        } else {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Invoce not found']);
        }
    }
}
