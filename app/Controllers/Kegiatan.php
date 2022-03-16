<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KegiatanModel;
use CodeIgniter\I18n\Time;

class Kegiatan extends BaseController
{

    protected $km;
    protected $time;

    public function __construct()
    {
        $this->km = new KegiatanModel();
        $this->time = new Time();
    }

    public function index()
    {
        return redirect()->to(base_url('/admin/kegiatan'));
    }

    public function store()
    {
        if ($this->request->getVar('nullTimes') == "true") {
            $time = null;
        } else {
            $time = $this->request->getVar('time');
        }

        $data = [
            'agenda' => $this->request->getVar('agenda'),
            'ruang' => $this->request->getVar('ruang'),
            'tanggal' => str_replace("T", " ", $this->request->getVar('tgl')),
            'time' => $time,
            'pj' => $this->request->getVar('pj'),
            'keterangan' => $this->request->getVar('keterangan')
        ];

        if ($this->km->save($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
            return redirect()->to(base_url('/admin/kegiatan'));
        } else {
            session()->setFlashdata('error', 'Data gagal ditambahkan!');
            return redirect()->to(base_url('/admin/kegiatan'));
        }
    }

    function update () {
        if ($this->request->getVar('nullTimes') == "true") {
            $time = null;
        } else {
            $time = $this->request->getVar('time');
        }

        $data = [
            'id' => $this->request->getVar('kode'),
            'agenda' => $this->request->getVar('agenda'),
            'ruang' => $this->request->getVar('ruang'),
            'tanggal' => str_replace("T", " ", $this->request->getVar('tgl')),
            'time' => $time,
            'pj' => $this->request->getVar('pj'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status' => $this->request->getVar('status')
        ];

        if ($this->km->save($data)) {
            session()->setFlashdata('success', 'Data berhasil diubah!');
            return redirect()->to(base_url('/admin/kegiatan'));
        } else {
            session()->setFlashdata('error', 'Data gagal diubah!');
            return redirect()->to(base_url('/admin/kegiatan'));
        }
    }

    function delete($id = null) {
        if($id !== null){
            if ($this->km->delete($id)) {
                session()->setFlashdata('success', 'Data berhasil dihapus!');
                return redirect()->to(base_url('/admin/kegiatan'));
            } else {
                session()->setFlashdata('error', 'Data gagal dihapus!');
                return redirect()->to(base_url('/admin/kegiatan'));
            }
        } else {
            return redirect()->to(base_url('/admin/kegiatan'));
        }
    }

    function updateStatus() {
        if ($this->request->getVar('resetStatus') == "true") {
            $status = null;
        } else {
            $status = $this->request->getVar('status');
        }
        
        $data = [
            'id' => $this->request->getVar('kode'),
            'status' => $status
        ];

        if ($this->km->save($data)) {
            session()->setFlashdata('success', 'Data berhasil diubah!');
            return redirect()->to(base_url('/admin/kegiatan'));
        } else {
            session()->setFlashdata('error', 'Data gagal diubah!');
            return redirect()->to(base_url('/admin/kegiatan'));
        }
    }

}
