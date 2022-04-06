<?php

namespace App\Models;

use CodeIgniter\Model;

class detailPerawatanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'detail_perawatan_tanaman';
    protected $useAutoIncrement = false;
    protected $insertID         = 1;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_perawatan', 'id_tanaman', 'nama_tanaman', 'id_user', 'nama', 'id_lokasi', 'nama_lokasi', 'jenis_perawatan', 'waktu', 'tanggal', 'status_perawatan'];

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
        return $this->table('detail_perawatan_tanaman')->like('nama', $search)->orLike('nama_tanaman', $search)->orLike('nama_lokasi', $search);
    }
}