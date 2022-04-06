<?php

namespace App\Models;

use CodeIgniter\Model;

class TanamanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_tanaman';
    protected $primaryKey       = 'id_tanaman';
    protected $useAutoIncrement = false;
    protected $insertID         = 1;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_tanaman', 'id_spesies', 'nama_tanaman', 'ciri_tanaman', 'jumlah', 'perawatan_khusus', 'qr_code', 'foto'];

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
        $query = $this->db->query("SELECT tambah_tanaman()");
        $row = $query->getRow();
        return $row;
    }

    public function search($search)
    {
        return $this->table('tbl_tanaman')->like('nama_tanaman', $search)->orLike('id_tanaman', $search);
    }
}