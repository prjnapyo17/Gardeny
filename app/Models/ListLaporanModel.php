<?php

namespace App\Models;

use CodeIgniter\Model;

class ListLaporanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'detail_laporan';
    protected $useAutoIncrement = false;
    protected $insertID         = 1;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_laporan','nama_tanaman','nama', 'nama_lokasi', 'jenis_laporan', 'isi_laporan', 'tanggal', 'foto'];

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

    public function search($search)
    {
        return $this->table('detail_laporan')->like('nama_tanaman', $search)->orLike('nama', $search)->orLike('nama_lokasi', $search);
    }
}