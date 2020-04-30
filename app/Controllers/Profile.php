<?php namespace App\Controllers;

use App\Models\Master_model;
use CodeIgniter\Controller;

class Profile extends Controller 
{
    public function __construct()
    {
        $this->master = new Master_model();
    }

    public function index($username)
    {
        $data = array(
            'title' => 'Profile - ' . $username,
            'segment' => $this->request->uri->getSegments(),
        );
        echo view('profile/view', $data);
    }

    public function edit_profile($username)
    {
        helper('form');
        $data = array(
            'title' => 'Edit Profile - ' . $username,
            'segment' => $this->request->uri->getSegments(),
            'user' => $this->master->get_by_id('users', 'username', $username)->getRow()
        );
        echo view('profile/edit', $data);
    }

    public function proses_edit_profile($username)
    {
        $validation = \Config\Services::validation();
        $input = array(
            'full_name' => $this->request->getPost('full_name'),
        );
        if($validation->run($input, 'profile') == FALSE)
        {
            helper('form');
            $data = array(
                'title' => 'Edit Profile - ' . $username,
                'segment' => $this->request->uri->getSegments(),
                'user' => $this->master->get_by_id('users', 'username', $username)->getRow()
            );
            echo view('profile/edit', $data);
        } else {
            $query = $this->master->edit_profile($username, $input);
            if ($query) {
                session()->setFlashdata('message', '<p class="alert alert-success">Berhasil mengubah profile</p>');
                return $this->response->redirect(site_url('profile/index/' . $username));
            } else {
                session()->setFlashdata('message', '<p class="alert alert-danger">Gagal mengubah profile</p>');
                return $this->response->redirect(site_url('profile/edit-profile/' . $username));
            }
        }
    }
}