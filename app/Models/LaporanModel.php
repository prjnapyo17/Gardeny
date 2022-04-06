<?php

namespace App\Models;

use CodeIgniter\Model;

class laporanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_laporan';
    protected $primaryKey       = 'id_laporan';
    protected $useAutoIncrement = false;
    protected $insertID         = 1;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_laporan', 'id_user', 'id_lokasi', 'id_sublokasi_tanaman', 'jenis_laporan', 'isi_laporan', 'tanggal', 'foto'];

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

    public function getLaporan($nama_penanggung = false){
        if ($nama_penanggung == false) {
            $sql = "SELECT * FROM pembuat_laporan ORDER BY jumlah_laporan DESC LIMIT 5";
            
            return $this->query($sql)->getResultArray();
        }

        return $this->where('nama_penanggung', $nama_penanggung)
            ->join('tbl_laporan', 'tbl_user.id_user=tbl_laporan.id_user')
            ->first();
    }

    public function getBulanan(){
        $sql = "SELECT * FROM jumlah_laporan_bulanan";    

        return $this->query($sql)->getResultArray();
    }

    public function getHarian(){
        $sql = "SELECT * FROM jumlah_laporan_harian";    

        return $this->query($sql)->getResultArray();
    }

    public function getNewId()
    {
        $query = $this->db->query("SELECT tambah_laporan    ()");
        $row = $query->getRow();
        return $row;
    }

    public function search($search)
    {
        return $this->table('tbl_laporan')->like('id_user', $search)->orLike('id_laporan', $search);
    }

}