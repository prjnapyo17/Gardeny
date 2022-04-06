<?php

namespace App\Models;

use CodeIgniter\Model;

class ListSublokasiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'detail_sublokasi_tanaman';
    protected $useAutoIncrement = false;
    protected $insertID         = 1;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_perawatan','nama_tanaman','nama_lokasi', 'detail_sublokasi', 'media_tanam', 'foto_satuan'];

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
        return $this->table('detail_perawatan_tanaman')->like('nama_tanaman', $search)->orLike('nama_lokasi', $search)->orLike('nama_lokasi', $search);
    }
}