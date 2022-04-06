<?php

namespace App\Models;

use CodeIgniter\Model;

class ListSpesiesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'detail_spesies';
    protected $useAutoIncrement = false;
    protected $insertID         = 1;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_spesies','nama_genus','nama_spesies', 'keterangan'];

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
        return $this->table('detail_spesies')->like('nama_genus', $search)->orLike('nama_spesies', $search);
    }
}