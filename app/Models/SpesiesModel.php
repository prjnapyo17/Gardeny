<?php

namespace App\Models;

use CodeIgniter\Model;

class SpesiesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_spesies';
    protected $primaryKey       = 'id_spesies';
    protected $useAutoIncrement = false;
    protected $insertID         = 1;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_spesies', 'id_genus', 'nama_spesies', 'keterangan'];

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
        $query = $this->db->query("SELECT tambah_spesies()");
        $row = $query->getRow();
        return $row;
    }

    public function search($search)
    {
        return $this->table('tbl_spesies')->like('id_spesies', $search)->orLike('nama_spesies', $search);
    }


}