<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaporanModel;
use App\Models\UserModel;
use App\Models\LokasiModel;
use App\Models\SublokasiModel;
use App\Models\ListLaporanModel;

class Laporan extends BaseController
{
    protected $laporanModel;
    protected $userModel;
    protected $lokasiModel;
    protected $sublokasiModel;
    protected $listLaporan;
    
    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
        $this->userModel = new UserModel();
        $this->lokasiModel = new LokasiModel();
        $this->sublokasiModel = new SublokasiModel();
        $this->listLaporan = new ListLaporanModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_laporan') ? $this->request->getVar('page_laporan') : 1;

        $search = $this->request->getVar('search');
        if($search){
            $llaporan = $this->listLaporan->search($search);
        }else{
            $llaporan = $this->listLaporan;
        }

        $user = $this->userModel->findAll();
        $lokasi = $this->lokasiModel->findAll();
        $slokasi = $this->sublokasiModel->findAll();
        
        $data = [
            'basetitle' => 'Halaman Dashboard',
            'title1' => 'Laporan',
            'llaporan' => $llaporan->paginate(5, 'laporan'),
            'pager' => $this->listLaporan->pager,
            'user' => $user,
            'lokasi' => $lokasi,
            'slokasi' => $slokasi,
            'currentPage' => $currentPage,
            'uri' => 'laporan',
            'user_login' => session()->get('nama'),
            'foto' => session()->get('foto'),
            'level' => session()->get('level')
        ];

        return view('dashboard/laporan', $data);
    }

    public function tambah()
    {
        if(!$this->validate([
            'id_user'                  => 'required',
            'id_lokasi'                => 'required',
            'id_sublokasi_tanaman'     => 'required',
            'jenis_laporan'            => 'required',
            'isi_laporan'              => 'required',
            'tanggal'                  => 'required',
        ])){

            session()->setFlashdata('gagal', 'Isi Data Harus Lengkap !');
            return redirect()->to('/laporan');
        }
        
        $foto = $this->request->getFile('foto');

        if ($foto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            $namaFoto = $foto->getRandomName();

            $foto->move('upload', $namaFoto);
        }

        $newIdLaporan = $this->laporanModel->getNewId();

        foreach ($newIdLaporan as $newid);

        $data_post = [
            'id_laporan'             => $newid,
            'id_user'                => $this->request->getVar('id_user'),
            'id_lokasi'              => $this->request->getVar('id_lokasi')   ,
            'id_sublokasi_tanaman'   => $this->request->getVar('id_sublokasi_tanaman'),
            'isi_laporan'            => $this->request->getVar('isi_laporan'),
            'jenis_laporan'          => $this->request->getVar('jenis_laporan'),
            'tanggal'                => $this->request->getVar('tanggal'),
            'foto'                   => $namaFoto,
        ];

        $save = $this->laporanModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Laporan Berhasil Ditambahkan.');
            //Input data berhasil
            return redirect()->to(base_url().'/laporan');
        }else{
            //Input data gagal
            echo "Data Gagal ditambah";
        }
    }

    public function getedit()
    {
            echo json_encode($this->laporanModel->find($_POST['id']));
    }

    public function edit()
    {
        $foto = $this->request->getFile('foto');

        if ($foto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
            
        }else {
            $namaFoto = $foto->getName();

            $foto->move('upload', $namaFoto);

            if ($this->request->getVar('fotoLama') != 'default.png') {
                unlink('upload/' . $this->request->getVar('fotoLama'));
            }
        }

        $data_post = [
            'id_laporan'           => $this->request->getVar('id_laporan'),
            'id_user'              => $this->request->getVar('id_user'),
            'id_lokasi'            => $this->request->getVar('id_lokasi'),
            'id_sublokasi_tanaman' => $this->request->getVar('id_sublokasi_tanaman'),
            'jenis_laporan'        => $this->request->getVar('jenis_laporan'),
            'isi_laporan'          => $this->request->getVar('isi_laporan'),
            'tanggal'              => $this->request->getVar('tanggal'),
            'foto'                 => $namaFoto,
        ];

        $save = $this->laporanModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Laporan Berhasil Diedit.');
            //Input data berhasil
            return redirect()->to(base_url().'/laporan');
        }else{
            //Input data gagal
            echo "Data Gagal diedit";
        }
    }

    public function getdetail()
    {
            echo json_encode($this->laporanModel->find($_POST['id']));
    }

    public function hapus($id_laporan)
    {
        if ($this->laporanModel->delete($id_laporan)) {
            session()->setFlashdata('gagal', 'Data Laporan Berhasil Dihapus.');
            //Input data berhasil
            return redirect()->to(base_url().'/laporan');
        }else{
            //Input data gagal
            echo "Data Gagal dihapus";
        }
    }
}