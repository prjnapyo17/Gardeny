<?php

namespace App\Models;

use CodeIgniter\Model;

class sublokasiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sublokasi_tanaman';
    protected $primaryKey       = 'id_sublokasi_tanaman';
    protected $useAutoIncrement = false;
    protected $insertID         = 1;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_sublokasi_tanaman', 'id_tanaman', 'id_lokasi', 'detail_sublokasi', 'media_tanam', 'foto'];

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
        $query = $this->db->query("SELECT tambah_sublokasi()");
        $row = $query->getRow();
        return $row;
    }
}