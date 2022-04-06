<?php

namespace App\Models;

use CodeIgniter\Model;

class FamiliModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_famili';
    protected $primaryKey       = 'id_famili';
    protected $useAutoIncrement = false;
    protected $insertID         = 1;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_famili', 'nama_famili', 'keterangan'];

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
        $query = $this->db->query("SELECT tambah_famili()");
        $row = $query->getRow();
        return $row;
    }

    public function search($search)
    {
        return $this->table('tbl_famili')->like('id_famili', $search)->orLike('nama_famili', $search);
    }

}