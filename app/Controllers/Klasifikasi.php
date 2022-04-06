<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GenusModel;
use App\Models\FamiliModel;
use App\Models\SpesiesModel;
use App\Models\ListGenusModel;
use App\Models\ListSpesiesModel;

class Klasifikasi extends BaseController
{
    protected $genusModel;
    protected $familiModel;
    protected $spesiesModel;
    protected $listGenus;
    protected $listSpesies;
    
    public function __construct()
    {
        $this->genusModel = new GenusModel();
        $this->familiModel = new FamiliModel();
        $this->spesiesModel = new SpesiesModel();
        $this->listGenus = new ListGenusModel();
        $this->listSpesies = new ListSpesiesModel();

    }

    public function index()
    {
        
        $data = [
            'basetitle' => 'Halaman Dashboard',
            'title1' => 'Klasifikasi Tanaman',
            'uri' => 'klasifikasi',
            'user_login' => session()->get('nama'),
            'foto' => session()->get('foto'),
            'level' => session()->get('level')
        ];

        return view('dashboard/klasifikasi/index', $data);
    }

    

    public function genus()
    {
        $currentPage = $this->request->getVar('page_genus') ? $this->request->getVar('page_genus') : 1;

        $search = $this->request->getVar('search');
        if($search){
            $lgenus = $this->listGenus->search($search);
        }else{
            $lgenus = $this->listGenus;
        }

        $famili = $this->familiModel->findAll();

        $data = [
            'basetitle' => 'Halaman Dashboard',
            'title1' => 'Genus',
            'lgenus' => $lgenus->paginate(5, 'genus'),
            'pager' => $this->listGenus->pager,
            'famili' => $famili,
            'currentPage' => $currentPage,
            'uri' => 'klasifikasi',
            'user_login' => session()->get('nama'),
            'foto' => session()->get('foto'),
            'level' => session()->get('level')
        ];

        return view('dashboard/klasifikasi/genus', $data);
    }

    public function tambahGenus()
    {
        if(!$this->validate([
            'nama_genus'        => 'required',
            'keterangan'         => 'required',
        ])){

            session()->setFlashdata('gagal', 'Isi Data Harus Lengkap !');
            return redirect()->to('/klasifikasi/genus');
        }

        $newIdGenus = $this->genusModel->getNewId();

        foreach ($newIdGenus as $newid);

        $data_post = [
            'id_genus'         => $newid,
            'id_famili'        => $this->request->getVar('id_famili'),
            'nama_genus'       => $this->request->getVar('nama_genus'),
            'keterangan'        => $this->request->getVar('keterangan'),
        ];

        $save = $this->genusModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Genus Berhasil Ditambahkan.');
            //Input data berhasil
            return redirect()->to(base_url().'/klasifikasi/genus');
        }else{
            //Input data gagal
            echo "Data Gagal ditambah";
        }

    }

    public function getEditGenus()
    {
        echo json_encode($this->genusModel->find($_POST['id']));
    }

    public function editGenus()
    {
        $data_post = [
            'id_genus'          => $this->request->getVar('id_genus'),
            'id_famili'          => $this->request->getVar('id_famili'),  
            'nama_genus'        => $this->request->getVar('nama_genus'),
            'keterangan'         => $this->request->getVar('keterangan'),
        ];

        $save = $this->familiModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Genus Berhasil Diedit.');
            //Input data berhasil
            return redirect()->to(base_url().'/klasifikasi/genus');
        }else{
            //Input data gagal
            echo "Data Gagal diedit";
        }
    }

    public function hapusGenus($id_genus)
    {
        if ($this->genusModel->delete($id_genus)) {
            session()->setFlashdata('gagal', 'Data Genus Berhasil Dihapus.');
            //Input data berhasil
            return redirect()->to(base_url().'/klasifikasi/genus');
        }else{
            //Input data gagal
            echo "Data Gagal dihapus";
        }
    }



    public function spesies()
    {
        $currentPage = $this->request->getVar('page_spesies') ? $this->request->getVar('page_spesies') : 1;

        $search = $this->request->getVar('search');
        if($search){
            $lspesies = $this->listSpesies->search($search);
        }else{
            $lspesies = $this->listSpesies;
        }

        $genus = $this->genusModel->findAll();

        $data = [
            'basetitle' => 'Halaman Dashboard',
            'title1' => 'Spesies',
            'lspesies' => $lspesies->paginate(5, 'spesies'),
            'genus'  => $genus,
            'pager' => $this->listSpesies->pager,
            'currentPage' => $currentPage,
            'uri' => 'klasifikasi',
            'user_login' => session()->get('nama'),
            'foto' => session()->get('foto'),
            'level' => session()->get('level')
        ];

        return view('dashboard/klasifikasi/spesies', $data);
    }

    public function tambahSpesies()
    {
        if(!$this->validate([
            'nama_spesies'       => 'required',
            'keterangan'         => 'required',
        ])){

            session()->setFlashdata('gagal', 'Isi Data Harus Lengkap !');
            return redirect()->to('/klasifikasi/spesies');
        }

        $newIdSpesies = $this->spesiesModel->getNewId();

        foreach ($newIdSpesies as $newid);

        $data_post = [
            'id_spesies'         => $newid,
            'id_genus'           => $this->request->getVar('id_genus'),
            'nama_spesies'       => $this->request->getVar('nama_spesies'),
            'keterangan'         => $this->request->getVar('keterangan'),
        ];

        var_dump($data_post);

        $save = $this->spesiesModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Spesies Berhasil Ditambahkan.');
            //Input data berhasil
            return redirect()->to(base_url().'/klasifikasi/spesies');
        }else{
            //Input data gagal
            echo "Data Gagal ditambah";
        }
    }

    public function getEditSpesies()
    {
        echo json_encode($this->spesiesModel->find($_POST['id']));
    }

    public function editSpesies()
    {
        $data_post = [
            'id_spesies'         => $this->request->getVar('id_spesies'),
            'id_genus'           => $this->request->getVar('id_genus'),  
            'nama_spesies'       => $this->request->getVar('nama_spesies'),
            'keterangan'         => $this->request->getVar('keterangan'),
        ];

        $save = $this->spesiesModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Spesies Berhasil Diedit.');
            //Input data berhasil
            return redirect()->to(base_url().'/klasifikasi/spesies');
        }else{
            //Input data gagal
            echo "Data Gagal diedit";
        }
    }

    public function hapusSpesies($id_spesies)
    {
        if ($this->spesiesModel->delete($id_spesies)) {
            session()->setFlashdata('gagal', 'Data Spesies Berhasil Dihapus.');
            //Input data berhasil
            return redirect()->to(base_url().'/klasifikasi/spesies');
        }else{
            //Input data gagal
            echo "Data Gagal dihapus";
        }
    }




    public function famili()
    {
        $currentPage = $this->request->getVar('page_famili') ? $this->request->getVar('page_famili') : 1;

        $search = $this->request->getVar('search');
        if($search){
            $famili = $this->familiModel->search($search);
        }else{
            $famili = $this->familiModel;
        }

        $data = [
            'basetitle' => 'Halaman Dashboard',
            'title1' => 'Famili',
            'famili' => $famili->paginate(5, 'famili'),
            'pager' => $this->familiModel->pager,
            'currentPage' => $currentPage,
            'uri' => 'klasifikasi',
            'user_login' => session()->get('nama'),
            'foto' => session()->get('foto'),
            'level' => session()->get('level')
        ];

        return view('dashboard/klasifikasi/famili', $data);
    }

    public function tambahFamili()
    {
        if(!$this->validate([
            'nama_famili'        => 'required',
            'keterangan'         => 'required',
        ])){

            session()->setFlashdata('gagal', 'Isi Data Harus Lengkap !');
            return redirect()->to('/klasifikasi/famili');
        }

        $newIdFamili = $this->familiModel->getNewId();

        foreach ($newIdFamili as $newid);

        $data_post = [
            'id_famili'        => $newid,
            'nama_famili'       => $this->request->getVar('nama_famili'),
            'keterangan'        => $this->request->getVar('keterangan'),
        ];

        $save = $this->familiModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Famili Berhasil Ditambahkan.');
            //Input data berhasil
            return redirect()->to(base_url().'/klasifikasi/famili');
        }else{
            //Input data gagal
            echo "Data Gagal ditambah";
        }

    }

    public function getEditFamili()
    {
        echo json_encode($this->familiModel->find($_POST['id']));
    }

    public function editFamili()
    {
        $data_post = [
            'id_famili'          => $this->request->getVar('id_famili'),  
            'nama_famili'        => $this->request->getVar('nama_famili'),
            'keterangan'         => $this->request->getVar('keterangan'),
        ];

        $save = $this->familiModel->save($data_post);
        if($save){
            session()->setFlashdata('pesan', 'Data Famili Berhasil Diedit.');
            //Input data berhasil
            return redirect()->to(base_url().'/klasifikasi/famili');
        }else{
            //Input data gagal
            echo "Data Gagal diedit";
        }
    }

    public function hapusFamili($id_famili)
    {
        if ($this->familiModel->delete($id_famili)) {
            session()->setFlashdata('gagal', 'Data Famili Berhasil Dihapus.');
            //Input data berhasil
            return redirect()->to(base_url().'/klasifikasi/famili');
        }else{
            //Input data gagal
            echo "Data Gagal dihapus";
        }
    }
}