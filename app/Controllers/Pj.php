<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JabatanModel;
use App\Models\PenanggungJawabModel;

class Pj extends BaseController
{
    protected $jm;
    protected $pjm;

    public function __construct() {
        $this->jm = new JabatanModel();
        $this->pjm = new PenanggungJawabModel();
    }

    public function index()
    {
        return redirect()->to(base_url('/admin/penanggung_jawab'));
    }

    public function store()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'ket' => $this->request->getPost('ket'),
        ];

        if ($this->pjm->save($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/pj');
        } else {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->to('/pj');
        }

    }

    public function update()
    {
        $data = [
            'id'    => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'ket' => $this->request->getPost('ket'),
        ];

        if ($this->pjm->save($data)) {
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/pj');
        } else {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->to('/pj');
        }

        return redirect()->to('/pj');
    }

    public function delete($id = null)
    {
        $this->pjm->delete($id);

        return redirect()->to('/pj');
    }

}
