<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth_model extends Model
{
    protected $table = 'users';

    public function login($username)
    {
        $query = $this->db->table($this->table)
                          ->getWhere(array('username' => $username));
        return $query;
    }

    public function register($data)
    {
        $this->db->table($this->table)
                 ->insert($data);
    }
}
