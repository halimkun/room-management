<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KegiatanModel;

class Kegiatan extends BaseController
{

    protected $km;

    public function __construct() {
        $this->km = new KegiatanModel();
    }

    public function index()
    {
        return redirect()->to(base_url('/admin/kegiatan'));
    }

    public function store()
    {
        $data = [
            'agenda' => $this->request->getVar('agenda'),
            'ruang' => $this->request->getVar('ruang'),
            'tanggal' => $this->request->getVar('tgl'),
            'pj' => $this->request->getVar('pj'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status' => $this->request->getVar('status')
        ];

        dd($data);

        if ($this->km->save($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
            return redirect()->to(base_url('/admin/kegiatan'));
        } else {
            session()->setFlashdata('error', 'Data gagal ditambahkan!');
            return redirect()->to(base_url('/admin/kegiatan'));
        }
    }

}
