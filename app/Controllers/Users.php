<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    protected $usermodel;


    public function __construct()
    {
        $this->usermodel = new UserModel();
    }

    // Tampilkan semua produk
    public function index()
    {
        $data['user'] = $this->usermodel->findAll();
        $data['title'] = 'Quantura | Users';

        return view('content/header', $data)
            . view('content/navbar')
            . view('content/sidebar')
            . view('konten/user', $data)
            . view('content/footer');
    }

    // Simpan atau update produk
    public function save()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        // Ambil data dari form
        $id = $this->request->getPost('id');
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role'),
            'created_at' => date('Y-m-d H:i:s')
        ];
        if ($id) {
            $this->usermodel->created_at($id, $data);
        } else {
            $this->usermodel->insert($data);
        }
        return redirect()->to('/user');
    }

    // Hapus produk berdasarkan ID
    public function delete($id)
    {
        $this->usermodel->delete($id);
        return redirect()->to('/user');
    }

    // Ambil data produk untuk keperluan edit
    public function edit($id)
    {
        $user = $this->usermodel->find($id);
        return $this->response->setJSON($user);
    }

    // Lihat detail produk (jika dibutuhkan)
    public function detail($id)
    {
        $user = $this->usermodel->find($id);
        if ($user) {
            return $this->response->setJSON($user);
        } else {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'User not found']);
        }
    }
}
