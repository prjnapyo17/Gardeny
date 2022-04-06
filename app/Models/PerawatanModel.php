<?php

namespace App\Models;

use CodeIgniter\Model;

class perawatanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_perawatan';
    protected $primaryKey       = 'id_perawatan';
    protected $useAutoIncrement = false;
    protected $insertID         = 1;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_perawatan', 'id_user', 'id_lokasi', 'jenis_perawatan', 'waktu', 'tanggal'];

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
        $query = $this->db->query("SELECT tambah_perawatan()");
        $row = $query->getRow();
        return $row;
    }

    public function getDetail($id_perawatan = false)
    {
        if ($id_perawatan == false) {
            $sql = "SELECT * FROM detail_perawatan_tanaman";

            return $this->query($sql)->getResultArray();
        }else{
            $sql = "SELECT * FROM detail_perawatan_tanaman WHERE id_perawatan='$id_perawatan'";

            return $this->query($sql)->getRow();
        }

    }

    public function search($search)
    {
        return $this->table('detail_perawatan_tanaman')->like('id_perawatan', $search)->orLike('nama', $search);
    }

}