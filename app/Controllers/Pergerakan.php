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

    public function index()
    {
        $data['pergerakan'] = $this->pergerakanmodel->getPergerakan();
        $data['products'] = $this->productmodel->findAll();
        $data['roles'] = $this->pergerakanmodel->getEnumPergerakan('stock_movements', 'type');
        $data['title'] = 'Quantura | Pergerakan Produk';

        return view('content/header', $data)
            . view('content/navbar')
            . view('content/sidebar')
            . view('konten/pergerakan', $data)
            . view('content/footer');
    }

    public function save()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'product_id' => 'required|is_natural_no_zero',
            'type'       => 'required',
            'quantity'   => 'required|numeric',
            'reference'  => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $id = $this->request->getPost('id');
        $product_id = $this->request->getPost('product_id');

        $product = $this->productmodel->find($product_id);
        if (!$product) {
            return redirect()->back()->withInput()->with('error', 'Produk tidak ditemukan!');
        }

        $data = [
            'product_id' => $product_id,
            'type'       => $this->request->getPost('type'),
            'quantity'   => $this->request->getPost('quantity'),
            'reference'  => $this->request->getPost('reference')
        ];

        if ($id) {
            $updated = $this->pergerakanmodel->update($id, $data);
            if (!$updated) {
                return redirect()->back()->with('error', 'Gagal update data.');
            }
        } else {
            $this->pergerakanmodel->insert($data);
        }

        return redirect()->to('/pergerakan')->with('success', 'Data berhasil disimpan.');
    }

    public function delete($id)
    {
        $this->pergerakanmodel->delete($id);
        return redirect()->to('/pergerakan')->with('success', 'Data berhasil dihapus.');
    }

    public function edit($id)
    {
        $pergerakan = $this->pergerakanmodel->find($id);
        if ($pergerakan) {
            $product = $this->productmodel->find($pergerakan['product_id']);
            $pergerakan['product_name'] = $product ? $product['name'] : '';
            return $this->response->setJSON($pergerakan);
        } else {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Data tidak ditemukan']);
        }
    }

    public function searchProduct()
    {
        $term = $this->request->getGet('term');
        $products = $this->productmodel
            ->like('name', $term)
            ->findAll(10);

        $result = [];
        foreach ($products as $product) {
            $result[] = [
                'id'    => $product['id'],
                'label' => $product['name'],
                'value' => $product['name']
            ];
        }

        return $this->response->setJSON($result);
    }
}
