<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PerawatanModel;
use App\Models\UserModel;
use App\Models\LokasiModel;
use App\Models\PerawatanTanamanModel;
use App\Models\TanamanModel;
use App\Models\DetailPerawatanModel;

class Perawatan extends BaseController
{
    protected $perawatanModel;
    protected $userModel;
    protected $lokasiModel;
    protected $perawatan_tanamanModel;
    protected $tanamanModel;
    protected $detailPerawatan;
    
    public function __construct()
    {
        $this->perawatanModel = new PerawatanModel();
        $this->userModel = new UserModel();
        $this->lokasiModel = new LokasiModel();
        $this->perawatan_tanamanModel = new PerawatanTanamanModel();
        $this->tanamanModel = new TanamanModel();
        $this->detailPerawatan = new DetailPerawatanModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_perawatan') ? $this->request->getVar('page_perawatan') : 1;

        $search = $this->request->getVar('search');
        if($search){
            $perawatan = $this->detailPerawatan->search($search);
        }else{
            $perawatan = $this->detailPerawatan;
        }

        $user = $this->userModel->findAll();
        $lokasi = $this->lokasiModel->findAll();
        $tanaman = $this->tanamanModel->findAll();

        $data = [
            'basetitle' => 'Halaman Dashboard',
            'title1' => 'Perawatan',
            'detail_perawatan' => $perawatan->paginate(5, 'perawatan'),
            'pager' => $this->detailPerawatan->pager,
            'currentPage' => $currentPage,
            'uri' => 'perawatan',
            'tanaman' => $tanaman,
            'user' => $user,
            'lokasi' => $lokasi,
            'user_login' => session()->get('nama'),
            'foto' => session()->get('foto'),
            'level' => session()->get('level')
        ];

        return view('dashboard/perawatan', $data);
    }

    public function tambah()
    {
        if(!$this->validate([
            'id_tanaman'      => 'required',
            'id_user'         => 'required',
            'id_lokasi'       => 'required',
            'jenis_perawatan' => 'required',
            'waktu'           => 'required',
            'tanggal'         => 'required',
            'status_perawatan'=> 'required'
        ])){

            session()->setFlashdata('gagal', 'Isi Data Harus Lengkap !');
            return redirect()->to('/perawatan');
        }

        $newIdPerawatan = $this->perawatanModel->getNewId();

        foreach ($newIdPerawatan as $newid);

        $data_perawatan = [
            'id_perawatan'      => $newid,
            'id_user'           => $this->request->getVar('id_user'),
            'id_lokasi'         => $this->request->getVar('id_lokasi'),
            'jenis_perawatan'   => $this->request->getVar('jenis_perawatan'),
            'waktu'             => $this->request->getVar('waktu'),
            'tanggal'           => $this->request->getVar('tanggal')
        ];

        $data_status = [
            'id_perawatan'  => $newid,
            'id_tanaman'    => $this->request->getVar('id_tanaman'),
            'status_perawatan'        => $this->request->getVar('status_perawatan')
        ];

        $save_perawatan = $this->perawatanModel->save($data_perawatan);
        
        $save_status = $this->perawatan_tanamanModel->save($data_status);

        if($save_perawatan){
            session()->setFlashdata('pesan', 'Data Perawatan Berhasil Ditambahkan.');
            //Input data berhasil
            return redirect()->to(base_url().'/perawatan');
        }else{
            //Input data gagal
            echo "Data Gagal ditambah";
        }

        if($save_status){
            session()->setFlashdata('pesan', 'Data Perawatan Berhasil Ditambahkan.');
            //Input data berhasil
            return redirect()->to(base_url().'/perawatan');
        }else{
            //Input data gagal
            echo "Data Gagal ditambah";
        }
    }

    public function getedit()
    {
        echo json_encode($this->perawatanModel->getDetail($_POST['id']));

        // $perawatan = $this->perawatanModel->findAll();
        // $user = $this->userModel->findAll();
        // $lokasi = $this->lokasiModel->findAll();
        // $perawatan_tanaman = $this->perawatan_tanamanModel->findAll();
        // $tanaman = $this->tanamanModel->findAll();

        // $data = [
        //     'perawatan' => $perawatan,
        //     'user' => $user,
        //     'lokasi' => $lokasi,
        //     'perawatan_tanaman' => $perawatan_tanaman,
        //     'tanaman' => $tanaman,
        //     'detail_perawatan' => $this->perawatanModel->getDetail($id_perawatan)
        // ];

        // return view('perawatan/getedit', $data);
    }

    public function edit(){

        $data_perawatan = [
            'id_perawatan'      => $this->request->getVar('id_perawatan'),
            'id_user'           => $this->request->getVar('id_user'),
            'id_lokasi'         => $this->request->getVar('id_lokasi'),
            'jenis_perawatan'   => $this->request->getVar('jenis_perawatan'),
            'waktu'             => $this->request->getVar('waktu'),
            'tanggal'           => $this->request->getVar('tanggal')
        ];

        $data_status = [
            'id_perawatan'      => $this->request->getVar('id_perawatan'),
            'id_tanaman'    => $this->request->getVar('id_tanaman'),
            'status_perawatan'        => $this->request->getVar('status_perawatan')
        ];

        
        $save_perawatan = $this->perawatanModel->save($data_perawatan);
        
        $save_status = $this->perawatan_tanamanModel->save($data_status);

        if($save_perawatan){
            session()->setFlashdata('pesan', 'Data perawatan Berhasil Diedit.');
            //Input data berhasil
            return redirect()->to(base_url().'/perawatan');
        }else{
            //Input data gagal
            echo "Data Gagal diedit";
        }

        if($save_status){
            session()->setFlashdata('pesan', 'Data perawatan Berhasil Diedit.');
            //Input data berhasil
            return redirect()->to(base_url().'/perawatan');
        }else{
            //Input data gagal
            echo "Data Gagal diedit";
        }

    }

    public function getdetail()
    {
        echo json_encode($this->perawatanModel->getDetail($_POST['id']));
    }

    public function hapus($id_perawatan){
        if ($this->perawatanModel->delete($id_perawatan)) {
            session()->setFlashdata('gagal', 'Data Perawatan Berhasil Dihapus.');
            //Input data berhasil
            return redirect()->to(base_url().'/perawatan');
        }else{
            //Input data gagal
            echo "Data Gagal dihapus";
        }
        if ($this->perawatan_tanamanModel->delete($id_perawatan)) {
            session()->setFlashdata('gagal', 'Data Perawatan Berhasil Dihapus.');
            //Input data berhasil
            return redirect()->to(base_url().'/perawatan');
        }else{
            //Input data gagal
            echo "Data Gagal dihapus";
        }
    }
}