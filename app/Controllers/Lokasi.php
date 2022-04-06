<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LokasiModel;
use App\Models\SublokasiModel;
use App\Models\TanamanModel;
use App\Models\ListSublokasiModel;


class Lokasi extends BaseController
{
    protected $lokasiModel;
    protected $subLokasi;
    protected $listSublokasi;
    
    public function __construct()
    {
        $this->lokasiModel = new LokasiModel();
        $this->sublokasiModel = new SublokasiModel();
        $this->tanamanModel = new TanamanModel();
        $this->listSublokasi = new ListSublokasiModel();

    }

    public function index()
    {
        
        $data = [
            'basetitle' => 'Halaman Dashboard',
            'title1' => 'Lokasi Tanaman',
            'uri' => 'lokasi',
            'user_login' => session()->get('nama'),
            'foto' => session()->get('foto'),
            'level' => session()->get('level')
        ];

        return view('dashboard/lokasi/index', $data);
    }

    // Lokasi Tanaman

    public function lokasi()
    {
        $currentPage = $this->request->getVar('page_lokasi') ? $this->request->getVar('page_lokasi') : 1;

        $search = $this->request->getVar('search');
        if($search){
            $lokasi = $this->lokasiModel->search($search);
        }else{
            $lokasi = $this->lokasiModel;
        }
        
        $data = [
            'basetitle' => 'Halaman Dashboard',
            'title1' => 'Lokasi',
            'lokasi' => $lokasi->paginate(5, 'lokasi'),
            'pager' => $this->lokasiModel->pager,
            'currentPage' => $currentPage,
            'uri'   => 'lokasi',
            'user_login' => session()->get('nama'),
            'foto' => session()->get('foto'),
            'level' => session()->get('level')
        ];

        return view('dashboard/lokasi/lokasi', $data);
    }

    public function tambahLokasi()
    {
        if(!$this->validate([
            'nama_lokasi'       => 'required',
            'keterangan'        => 'required'
        ])){

            session()->setFlashdata('gagal', 'Isi Data Harus Lengkap !');
            return redirect()->to('/lokasi/lokasi');
        }

        $newIdLokasi = $this->lokasiModel->getNewId();

        foreach ($newIdLokasi as $newid);

        $data_post = [
            'id_lokasi'        => $newid,
            'nama_lokasi'        => $this->request->getVar('nama_lokasi'),
            'keterangan'      => $this->request->getVar('keterangan')
        ];

        $save = $this->lokasiModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Lokasi Berhasil Ditambahkan.');
            //Input data berhasil
            return redirect()->to(base_url().'/lokasi/lokasi');
        }else{
            //Input data gagal
            echo "Data Gagal ditambah";
        }
    }

    public function getEditLokasi()
    {
            echo json_encode($this->lokasiModel->find($_POST['id']));
    }

    public function editLokasi(){

        $data_post = [
            'id_lokasi'        => $this->request->getVar('id_lokasi'),
            'nama_lokasi'        => $this->request->getVar('nama_lokasi'),
            'keterangan'        => $this->request->getVar('keterangan')
        ];

        $save = $this->lokasiModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Lokasi Berhasil Diedit.');
            //Input data berhasil
            return redirect()->to(base_url().'/lokasi/lokasi');
        }else{
            //Input data gagal
            echo "Data Gagal diedit";
        }
    }

    public function getDetail()
    {
            echo json_encode($this->lokasiModel->find($_POST['id']));
    }

    public function hapusLokasi($id_lokasi){
        if ($this->lokasiModel->delete($id_lokasi)) {
            session()->setFlashdata('gagal', 'Data Lokasi Berhasil Dihapus.');
            //Input data berhasil
            return redirect()->to(base_url().'/lokasi/lokasi');
        }else{
            //Input data gagal
            echo "Data Gagal dihapus";
        }
    }


    //Sublokasi Tanaman
    public function sublokasi()
    {
        $currentPage = $this->request->getVar('page_lokasi') ? $this->request->getVar('page_lokasi') : 1;

        $search = $this->request->getVar('search');
        if($search){
            $lsublokasi = $this->listSublokasi->search($search);
        }else{
            $lsublokasi = $this->listSublokasi;
        }

        $sublokasi = $this->sublokasiModel->findAll();
        $tanaman = $this->tanamanModel->findAll();
        $lokasi = $this->lokasiModel->findAll();
        
        $data = [
            'basetitle' => 'Halaman Dashboard',
            'sublokasi' => $sublokasi,
            'lsublokasi' => $lsublokasi->paginate(5, 'sublokasi'),
            'lokasi' => $lokasi,
            'tanaman' => $tanaman,
            'pager' => $this->listSublokasi->pager,
            'currentPage' => $currentPage,
            'title1' => 'Sublokasi',
            'uri'   => 'lokasi',
            'user_login' => session()->get('nama'),
            'foto' => session()->get('foto'),
            'level' => session()->get('level')
        ];
        
        return view('dashboard/lokasi/sublokasi', $data);
    }
    
    public function tambahSublokasi()
    {
        if(!$this->validate([
            'id_tanaman'        => 'required',
            'id_lokasi'         => 'required',
            'detail_sublokasi'     => 'required',
            'media_tanam'       => 'required',
        ])){

            session()->setFlashdata('gagal', 'Isi Data Harus Lengkap !');
            return redirect()->to('/lokasi/sublokasi');
        }

        $foto = $this->request->getFile('foto');

        if ($foto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            $namaFoto = $foto->getRandomName();

            $foto->move('upload', $namaFoto);
        }

        $newIdsublokasi = $this->sublokasiModel->getNewId();

        $tanaman = $this->request->getVar('id_tanaman');

        foreach ($newIdsublokasi as $newid);

        $data_post = [
            'id_sublokasi_tanaman'  => $newid,
            'id_tanaman'            => $this->request->getVar('id_tanaman'),
            'id_lokasi'             => $this->request->getVar('id_lokasi'),
            'detail_sublokasi'      => $this->request->getVar('detail_sublokasi'),
            'media_tanam'           => $this->request->getVar('media_tanam'),
            'foto'                  => $namaFoto,
        ];

        $save = $this->sublokasiModel->save($data_post);

        $this->tanamanModel->query("CALL tambah_jumlah_tanaman('".$tanaman."');");

        if($save){
            session()->setFlashdata('pesan', 'Data Sublokasi Berhasil Ditambahkan.');
            //Input data berhasil
            return redirect()->to(base_url().'/lokasi/sublokasi');
        }else{
            //Input data gagal
            echo "Data Gagal ditambah";
        }
    }

    public function getEditSublokasi()
    {
        echo json_encode($this->sublokasiModel->find($_POST['id']));
    }

    public function editSublokasi(){

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
            'id_sublokasi_tanaman'  => $this->request->getVar('id_sublokasi_tanaman'),
            'id_tanaman'            => $this->request->getVar('id_tanaman'),
            'id_lokasi'             => $this->request->getVar('id_lokasi'),
            'detail_sublokasi'      => $this->request->getVar('detail_sublokasi'),
            'media_tanam'           => $this->request->getVar('media_tanam'),
            'foto'                  => $namaFoto,
        ];

        $save = $this->sublokasiModel->save($data_post);

        if($save){
            session()->setFlashdata('pesan', 'Data Sublokasi Berhasil Diedit.');
            //Input data berhasil
            return redirect()->to(base_url().'/lokasi/sublokasi');
        }else{
            //Input data gagal
            echo "Data Gagal diedit";
        }
    }

    public function getDetailLokasi()
    {
            echo json_encode($this->sublokasiModel->find($_POST['id']));
    }

    public function hapusSublokasi($id_sublokasi_tanaman)
    {
        $getsub = $this->sublokasiModel->find($id_sublokasi_tanaman);

        $tanaman = $getsub['id_tanaman'];

        $this->tanamanModel->query("CALL kurang_jumlah_tanaman('".$tanaman."');");

        if ($this->sublokasiModel->delete($id_sublokasi_tanaman)) {
            session()->setFlashdata('gagal', 'Data Sublokasi Berhasil Dihapus.');
            //Input data berhasil
            return redirect()->to(base_url().'/lokasi/sublokasi');
        }else{
            //Input data gagal
            echo "Data Gagal dihapus";
        }
    }
}