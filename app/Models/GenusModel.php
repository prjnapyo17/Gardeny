<?php

namespace App\Models;

use CodeIgniter\Model;

class GenusModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_genus';
    protected $primaryKey       = 'id_genus';
    protected $useAutoIncrement = false;
    protected $insertID         = 1;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_genus', 'id_famili', 'nama_genus', 'keterangan'];

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
        $query = $this->db->query("SELECT tambah_genus()");
        $row = $query->getRow();
        return $row;
    }

    public function search($search)
    {
        return $this->table('tbl_genus')->like('id_famili', $search)->orLike('nama_genus', $search);
    }

}