<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JabatanModel;

class Jabatan extends BaseController
{
    
    protected $jm;

    public function __construct() {
        $this->jm = new JabatanModel();
    }

    public function index()
    {
        return redirect()->to(base_url('/admin/jabatan'));
    }

    public function store()
    {
        $data = [
            "jabatan" => $this->request->getVar('jabatan'),
            "ket" => $this->request->getVar('ket'),
        ];
        
        if ($this->jm->save($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('/jabatan'));
        } else {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->to(base_url('/jabatan'));
        }
    }

    public function update()
    {
        $data = [
            "id" => $this->request->getVar('id'),
            "jabatan" => $this->request->getVar('jabatan'),
            "ket" => $this->request->getVar('ket'),
        ];
        
        if ($this->jm->save($data)) {
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to(base_url('/jabatan'));
        } else {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->to(base_url('/jabatan'));
        }
    }

    public function delete($id = null)
    {
        if($id !== null) {
            if ($this->jm->delete($id)) {
                session()->setFlashdata('success', 'Data berhasil dihapus');
                return redirect()->to(base_url('/jabatan'));
            } else {
                session()->setFlashdata('error', 'Data gagal dihapus');
                return redirect()->to(base_url('/jabatan'));
            }
        } else {
            session()->setFlashdata('error', 'Data gagal dihapus');
            return redirect()->to(base_url('/jabatan'));
        }
    }

}
