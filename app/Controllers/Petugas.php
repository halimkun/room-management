<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\UserModel;

class Petugas extends BaseController
{
    protected $user;
    
    public function __construct() {
        $this->user = new UserModel();
    }

    public function index()
    {
        return redirect()->to('/admin/petugas');
    }

    public function store()
    {
        $data = [
            "nama"     => $this->request->getPost('nama'),
            "username" => $this->request->getPost('username'),
            "email"    => $this->request->getPost('email'),
            "bagian"    => $this->request->getPost('bagian'),
            "password" => $this->request->getPost('password'),
            "active"   => 1,
        ];
        
        $data = new User($data);
        // dd($data);

        if ($this->user->withGroup('admin')->save($data)) {
            session()->setFlashdata('success', 'Data berhasil disimpan!');
            return redirect()->to('/admin/petugas');
        } else {
            session()->setFlashdata('error', 'Data gagal disimpan!');
            return redirect()->to('/admin/petugas');
        }
    }

    public function update()
    {
        $data = [
            "id"      => $this->request->getPost('randomEdit'),
            "nama"     => $this->request->getPost('nama'),
            "username" => $this->request->getPost('username'),
            "email"    => $this->request->getPost('email'),
            "bagian"    => $this->request->getPost('bagian'),
        ];
        
        $data = new User($data);
        
        if ($this->user->save($data)) {
            session()->setFlashdata('success', 'Data berhasil disimpan!');
            return redirect()->to('/admin/petugas');
        } else {
            session()->setFlashdata('error', 'Data gagal disimpan!');
            return redirect()->to('/admin/petugas');
        }
    }

    public function update_pass()
    {
        $data = [
            "id"       => $this->request->getPost('randomEdit'),
            "password" => $this->request->getPost('password'),
        ];
        
        $data = new User($data);
        
        if ($this->user->save($data)) {
            session()->setFlashdata('success', 'Data berhasil disimpan!');
            return redirect()->to('/admin/petugas');
        } else {
            session()->setFlashdata('error', 'Data gagal disimpan!');
            return redirect()->to('/admin/petugas');
        }
    }

    public function del($id = null)
    {
        if ($id == null) {
            return redirect()->to(base_url('admin/petugas'));
        } else {
            if ($this->user->delete($id)) {
                return redirect()->to('/admin/petugas')->with('success', 'Data berhasil disimpan');
            } else {
                dd("Gagal menghapus ruang");
                return redirect()->to('/admin/petugas')->with('gagal', 'Gagal menghapus data');
            }
        }
    }
}
