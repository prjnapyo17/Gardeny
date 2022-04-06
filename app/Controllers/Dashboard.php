<?php

namespace App\Controllers;

use App\Models\TanamanModel;
use App\Models\LokasiModel;
use App\Models\LaporanModel;
use App\Models\UserModel;
use App\Models\PerawatanModel;

class Dashboard extends BaseController
{
    protected $tanamanModel;
    protected $lokasiModel;
    protected $laporanModel;
    protected $userModel;
    protected $perawatanModel;

    public function __construct()
    {
        $this->tanamanModel = new TanamanModel();
        $this->lokasiModel = new LokasiModel();
        $this->laporanModel = new LaporanModel();
        $this->userModel = new UserModel();
        $this->perawatanModel = new PerawatanModel();
    }

    public function index()
    {

        $data = [
                'total_tanaman' => $this->tanamanModel->countAllResults(),
                'total_lokasi' => $this->lokasiModel->countAllResults(),
                'total_perawatan' => $this->perawatanModel->countAllResults(),
                'nama_penanggung' => $this->laporanModel->getLaporan(),
                'total_user' => $this->userModel->getUser(),
                'laporan_harian' => $this->laporanModel->getHarian(),
                'laporan_bulanan' => $this->laporanModel->getBulanan(),
                'uri' => 'dashboard',
                'user_login' => session()->get('nama'),
                'foto' => session()->get('foto'),
                'level' => session()->get('level')
        ];
        
        return view('dashboard/index', $data);
    }
}