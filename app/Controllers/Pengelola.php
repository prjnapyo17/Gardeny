<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PengelolaModel;

class Pengelola extends BaseController
{
    protected $pengelolaModel;    
    
    public function __construct()
    {    
        $this->pengelolaModel = new pengelolaModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_pengelola') ? $this->request->getVar('page_pengelola') : 1;

        $search = $this->request->getVar('search');
        if($search){
            $pengelola = $this->pengelolaModel->search($search);
        }else{
            $pengelola = $this->pengelolaModel;
        }

        $data = [
            'basetitle' => 'Halaman Dashboard',
            'title1' => 'Pengelola',
            'pengelola' => $pengelola->paginate(5, 'pengelola'),
            'pager' => $this->pengelolaModel->pager,
            'currentPage' => $currentPage,
            'uri' => 'pengelola',
            'user_login' => session()->get('nama'),
            'foto' => session()->get('foto'),
            'level' => session()->get('level')
        ];

        return view('dashboard/pengelola', $data);
    }

    public function tambah()
    {
        if(!$this->validate([
            'nama_pengelola'        => 'required',
            'email'                 => 'required',
            'password'              => 'required',
            'no_telp'               => 'required',
        ])){

            session()->setFlashdata('gagal', 'Isi Data Harus Lengkap !');
            return redirect()->to('/pengelola');
        }

        $foto = $this->request->getFile('foto');

        if ($foto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            $namaFoto = $foto->getRandomName();

            $foto->move('upload', $namaFoto);
        }

        $newIdPengelola = $this->pengelolaModel->getNewId();

        $password  = $this->request->getVar('password');

        foreach ($newIdPengelola as $newid);

        $data_post = [
            'id_user'         => $newid,
            'nama'            => $this->request->getVar('nama_pengelola'),
            'email'           => $this->request->getVar('email'),
            'password'        => md5($password),
            'level'           => 'pengelola',
            'no_telp'         => $this->request->getVar('no_telp'),
            'foto'            => $namaFoto,
        ];

        $save = $this->pengelolaModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Pengelola Berhasil Ditambahkan.');
            //Input data berhasil
            return redirect()->to(base_url().'/pengelola');
        }else{
            //Input data gagal
            echo "Data Gagal ditambah";
        }

    }

    public function getedit()
    {
            echo json_encode($this->pengelolaModel->find($_POST['id']));
    }

    public function edit(){

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
            'id_user'           => $this->request->getVar('id_pengelola'),
            'nama'              => $this->request->getVar('nama_pengelola'),
            'email'             => $this->request->getVar('email'),
            'no_telp'           => $this->request->getVar('no_telp'),
            'foto'              => $namaFoto,
        ];

        $save = $this->pengelolaModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Pengelola Berhasil Diedit.');
            //Input data berhasil
            return redirect()->to(base_url().'/pengelola');
        }else{
            //Input data gagal
            echo "Data Gagal diedit";
        }
    }

    public function hapus($id_pengelola){
        if ($this->pengelolaModel->delete($id_pengelola)) {
            session()->setFlashdata('gagal', 'Data Pengelola Berhasil Dihapus.');
            //Input data berhasil
            return redirect()->to(base_url().'/pengelola');
        }else{
            //Input data gagal
            echo "Data Gagal dihapus";
        }
    }
}