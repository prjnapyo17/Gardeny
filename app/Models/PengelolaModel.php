<?php

namespace App\Models;

use CodeIgniter\Model;

class PengelolaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user_pengelola';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = false;
    protected $insertID         = 1;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'nama', 'email', 'password', 'level', 'no_telp', 'foto'];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getNewId()
    {
        $query = $this->db->query("SELECT tambah_user()");
        $row = $query->getRow();
        return $row;
    }

    public function search($search)
    {
        return $this->table('user_pengelola')->like('id_user', $search)->orLike('nama', $search);
    }
}