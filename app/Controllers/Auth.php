<?php

namespace App\Controllers;

use App\Models\Auth_model;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function index()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $data  = array(
            'title' => 'Login',
            'validation' => $validation
        );
        echo view('auth/login', $data);
    }

    public function loginUser()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $input  = array(
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        );
        if ($validation->run($input, 'login') == FALSE) {
            $data = array(
                'title' => 'Login',
                'validation' => $validation
            );
            echo view('auth/login', $data);
        } else {
            $model = new Auth_model();
            $user = $model->login($input['username'])->getRow();

            if (password_verify($input['password'], $user->password)) {
                $data = array(
                    'id_user' => $user->id_user,
                    'full_name' => $user->full_name,
                    'username' => $user->username
                );
                session()->set($data);
                session()->setFlashdata('message', '<h1 class="title-4">Welcome back<span> ' . session()->get('full_name') . '!</span></h1>');
                return redirect()->route('dashboard');
            } else {
                session()->setFlashdata('message', '<p class="text-danger">Password salah! Silahkan ulangi kembali');
                return redirect()->route('/');
            }
        }
    }

    public function register()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $data = array(
            'title' => 'Register',
            'validation' => $validation
        );
        echo view('auth/register', $data);
    }


    public function registerUser()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $data = array(
            'full_name' => $this->request->getPost('full_name'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'conf_password' => $this->request->getPost('conf_password'),
        );
        if ($validation->run($data, 'register') == FALSE) {
            $data = array(
                'title' => 'Register',
                'validation' => $validation
            );
            echo view('auth/register', $data);
        } else {
            $data = array(
                'full_name' => $this->request->getPost('full_name'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            );
            $model = new Auth_model();
            $model->register($data);
            session()->setFlashdata('message', '<p class="text-success">Pendaftaran berhasil! Silahkan login</p>');
            return redirect()->route('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->route('/');
    }
}
