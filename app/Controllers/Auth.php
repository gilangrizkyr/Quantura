<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('auth', ['title' => 'Quantura | Login']);
    }

    public function login()
    {
        helper(['form']);
        $session = session();

        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('auth', [
                'title' => 'Login',
                'validation' => $this->validator
            ]);
        }

        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Regenerate session ID
                session()->regenerate(true);

                $session->set([
                    'user_id'       => $user['id'],
                    'username'      => $user['username'],
                    'role'          => $user['role'],
                    'profile_image' => $user['profile_image'],
                    'logged_in'     => true,
                ]);

                log_message('info', "User '{$username}' logged in successfully.");
                return redirect()->to('/konten/dashboard');
            } else {
                log_message('error', "Login failed: wrong password for '{$username}'");
                sleep(1); // Delay to prevent brute force
                $session->setFlashdata('error', 'Password salah');
                return redirect()->to('/login')->withInput();
            }
        } else {
            log_message('error', "Login failed: username '{$username}' not found");
            sleep(1);
            $session->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->to('/login')->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
