<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_lokasi';
    protected $primaryKey       = 'id_lokasi';
    protected $useAutoIncrement = false;
    protected $insertID         = 1;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_lokasi', 'nama_lokasi', 'keterangan'];

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
        $query = $this->db->query("SELECT tambah_lokasi()");
        $row = $query->getRow();
        return $row;
    }

    public function search($search)
    {
        return $this->table('tbl_lokasi')->like('nama_lokasi', $search)->orLike('id_lokasi', $search);
    }

}