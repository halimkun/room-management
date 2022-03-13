<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LantaiModel;

class Lantai extends BaseController
{
    protected $lm;

    public function __construct() {
        $this->lm = new LantaiModel();
    }

    public function index()
    {
        // $data = [
        //     "title" => "Data Lantai",
        //     "lantai" => $this->lm->findAll()
        // ];
        // return view('admin/lantai', $data);
        return redirect()->to(base_url('/ruang'));
    }

    public function store()
    {
        $data = [
            "nama_lantai" => $this->request->getVar('lantai'),
            "keterangan" => $this->request->getVar('ket'),
        ];

       if ($this->lm->save($data)) {
           return redirect()->to('/lantai');
       } else {
           return redirect()->to('/lantai')->with('gagal', 'Data gagal ditambahkan');
       }
    }

    public function edit()
    {
        $data = [
            "id" => $this->request->getVar('kode'),
            "nama_lantai" => $this->request->getVar('lantai'),
            "keterangan" => $this->request->getVar('ket'),
        ];
        
        if ($this->lm->save($data)) {
            return redirect()->to('/lantai');
        } else {
            return redirect()->to('/lantai')->with('gagal', 'Data gagal ditambahkan');
        }
    }

    public function del($kode = null)
    {
        if($kode == null) {
            return redirect()->to('/lantai');
        } else {
            $this->lm->delete($kode);
            return redirect()->to('/lantai');
        }
    }

}
