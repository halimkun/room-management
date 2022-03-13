<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LantaiModel;
use App\Models\RuangModel;

class Ruang extends BaseController
{

    protected $lm;
    protected $rm;

    public function __construct() {
        $this->lm = new LantaiModel();
        $this->rm = new RuangModel();
    }

    public function index()
    {
        return redirect()->to(base_url('/admin/ruang'));
    }

    public function store()
    {
        $data = [
            "kode" => uniqid(),
            "ruang" => $this->request->getPost('ruang'),
            "lantai" => $this->request->getPost('lantai'),
            "keterangan" => $this->request->getPost('ket')
        ];
        
        if ($this->rm->save($data)) {
            return redirect()->to('/ruang');
        } else {
            return redirect()->to('/ruang')->with('gagal', 'Gagal menambahkan data');
        }
    }

    public function edit()
    {

        $old = $this->rm->where(['kode' => $this->request->getVar('kode')])->first();

        $data = [
            "id" => $old->id,
            "kode" => $old->kode,
            "ruang" => $this->request->getPost('ruang'),
            "lantai" => $this->request->getPost('lantai'),
            "keterangan" => $this->request->getPost('ket')
        ];

        if ($this->rm->save($data)) {
            return redirect()->to('/ruang');
        } else {
            return redirect()->to('/ruang')->with('gagal', 'Gagal menambahkan data');
        }
    }

    public function del($id = null)
    {
        if($id == null) {
            return redirect()->to('/ruang');
        } else {
            if ($this->rm->delete($id)) {
                return redirect()->to('/ruang');
            } else {
                dd("Gagal menghapus ruang");
                return redirect()->to('/ruang')->with('gagal', 'Gagal menghapus data');
            }
        }
    }

}
