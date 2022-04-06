<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    
    public function index()
    {
        helper(['form']);
        return view('startpage/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url().'/login');
    }

    public function auth(){
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = md5($this->request->getVar('password'));

        $data = $model->where('email', $email)->first();

        if($data){
            if($data['password'] == $password){
                $session_user = [
                    'id_user'       => $data['id_user'],
                    'nama'          => $data['nama'],
                    'password'      => $data['password'],
                    'foto'          => $data['foto'],
                    'level'         => $data['level'],
                    'LOGIN_SUCCESS'    => true
                ];

                session()->set($session_user);
                
                return redirect()->to(base_url() . '/dashboard');
            } else {
                session()->setFlashdata('gagal', 'Password Salah!');
                return redirect()->to(base_url().'/login');
            }
        } else {
            session()->setFlashdata('gagal', 'Anda tidak punya akses akun!');
            return redirect()->to(base_url().'/login');
        }
    }
}