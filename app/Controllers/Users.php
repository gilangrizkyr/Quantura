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
        $data['roles'] = $this->usermodel->getEnumValues('users', 'role');
        $data['title'] = 'Quantura | Users';

        return view('content/header', $data)
            . view('content/navbar')
            . view('content/sidebar')
            . view('konten/user', $data)
            . view('content/footer');
    }

    public function save()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'permit_empty',
            'role' => 'required',
            'profile_image' => [
                'mime_in[profile_image,image/jpg,image/jpeg,image/png,image/gif]',
                'max_size[profile_image,2048]'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('profile_image');
        $fileName = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(FCPATH . 'upload', $fileName);
        }

        $id       = $this->request->getPost('id');
        $password = $this->request->getPost('password');
        $username = $this->request->getPost('username');
        $role     = $this->request->getPost('role');

        $existingUser = $this->usermodel
            ->where('username', $username)
            ->where('id !=', $id)
            ->first();

        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Username sudah digunakan.');
        }

        $data = [
            'username' => $username,
            'role' => $role,
        ];

        if ($password) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($fileName) {
            $data['profile_image'] = $fileName;
        }

        if ($id) {
            $this->usermodel->update($id, $data);
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->usermodel->insert($data);
            $id = $this->usermodel->getInsertID(); // Untuk ambil ID user baru
        }

        // ✅ Update session jika user yang login adalah user yang diedit
        if (session()->get('user_id') == $id) {
            $updatedUser = $this->usermodel->find($id);
            session()->set([
                'username'      => $updatedUser['username'],
                'role'          => $updatedUser['role'],
                'profile_image' => $updatedUser['profile_image'] ?? null,
            ]);
        }

        return redirect()->to('/users')->with('success', $id ? 'Pengguna berhasil diupdate.' : 'Pengguna berhasil ditambahkan.');
    }



    // Hapus produk berdasarkan ID
    public function delete($id)
    {
        $user = $this->usermodel->find($id);
        if ($user && !empty($user['profile_image'])) {
            $filePath = FCPATH . 'upload/' . $user['profile_image'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $this->usermodel->delete($id);
        return redirect()->to('/users')->with('success', 'Pengguna berhasil dihapus.');
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
