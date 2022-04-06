<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TanamanModel;
use App\Models\SpesiesModel;

class Tanaman extends BaseController
{
    protected $tanamanModel;
    protected $spesiesModel;
    
    public function __construct()
    {
        $this->tanamanModel = new TanamanModel();
        $this->spesiesModel = new SpesiesModel();
    }

    public function index()
    {


        $currentPage = $this->request->getVar('page_tanaman') ? $this->request->getVar('page_tanaman') : 1;

        $search = $this->request->getVar('search');
        if($search){
            $tanaman = $this->tanamanModel->search($search);
        }else{
            $tanaman = $this->tanamanModel;
        }

        $spesies = $this->spesiesModel->findAll();
        
        $data = [
            'basetitle' => 'Halaman Dashboard',
            'title1' => 'Tanaman',
            'tanaman' => $tanaman->paginate(5, 'tanaman'),
            'pager' => $this->tanamanModel->pager,
            'spesies' => $spesies,
            'currentPage' => $currentPage,
            'uri' => 'tanaman',
            'user_login' => session()->get('nama'),
            'foto' => session()->get('foto'),
            'level' => session()->get('level')
        ];

        return view('dashboard/tanaman', $data);
    }

    public function tambah()
    {
        if(!$this->validate([
            'id_spesies'        => 'required',
            'nama_tanaman'      => 'required',
            'ciri_tanaman'      => 'required',
            'jumlah'            => 'required',
            'perawatan_khusus'  => 'required',
        ])){

            session()->setFlashdata('gagal', 'Isi Data Harus Lengkap !');
            return redirect()->to('/tanaman');
        }

        $fileQr = $this->request->getFile('qr_code');

        if ($fileQr->getError() == 4) {
            $namaQr = 'default.png';
        } else {
            $namaQr = $fileQr->getRandomName();

            $fileQr->move('upload', $namaQr);
        }

        $foto = $this->request->getFile('foto');

        if ($foto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            $namaFoto = $foto->getRandomName();

            $foto->move('upload', $namaFoto);
        }

        $newIdTanaman = $this->tanamanModel->getNewId();

        foreach ($newIdTanaman as $newid);

        $data_post = [
            'id_tanaman'        => $newid,
            'id_spesies'        => $this->request->getVar('id_spesies'),
            'nama_tanaman'      => $this->request->getVar('nama_tanaman'),
            'ciri_tanaman'      => $this->request->getVar('ciri_tanaman'),
            'jumlah'            => 0,
            'perawatan_khusus'  => $this->request->getVar('perawatan_khusus'),
            'qr_code'           => $namaQr,
            'foto'              => $namaFoto,
        ];

        $save = $this->tanamanModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Tanaman Berhasil Ditambahkan.');
            //Input data berhasil
            return redirect()->to(base_url().'/tanaman');
        }else{
            //Input data gagal
            echo "Data Gagal ditambah";
        }
    }

    public function getedit()
    {
            echo json_encode($this->tanamanModel->find($_POST['id']));
    }

    public function edit(){
        $fileQr = $this->request->getFile('qr_code');

        if ($fileQr->getError() == 4) {
            $namaQr = $this->request->getVar('qrLama');
            
        }else {
            $namaQr = $fileQr->getName();

            $fileQr->move('upload', $namaQr);

            if ($this->request->getVar('qrLama') != 'default.png') {
                unlink('upload/' . $this->request->getVar('qrLama'));
            }
            
        }

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
            'id_tanaman'        => $this->request->getVar('id_tanaman'),
            'id_spesies'        => $this->request->getVar('id_spesies'),
            'nama_tanaman'      => $this->request->getVar('nama_tanaman'),
            'ciri_tanaman'      => $this->request->getVar('ciri_tanaman'),
            'jumlah'            => $this->request->getVar('jumlah'),
            'perawatan_khusus'  => $this->request->getVar('perawatan_khusus'),
            'qr_code'           => $namaQr,
            'foto'              => $namaFoto,
        ];

        $save = $this->tanamanModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Tanaman Berhasil Diedit.');
            //Input data berhasil
            return redirect()->to(base_url().'/tanaman');
        }else{
            //Input data gagal
            echo "Data Gagal diedit";
        }
    }

    public function getdetail()
    {
            echo json_encode($this->tanamanModel->find($_POST['id']));
    }

    public function hapus($id_tanaman)
    {
        if ($this->tanamanModel->delete($id_tanaman)) {
            session()->setFlashdata('gagal', 'Data Tanaman Berhasil Dihapus.');
            //Input data berhasil
            return redirect()->to(base_url().'/tanaman');
        }else{
            //Input data gagal
            echo "Data Gagal dihapus";
        }
    }
}