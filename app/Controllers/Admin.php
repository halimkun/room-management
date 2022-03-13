<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{

    protected $rm;
    protected $pjm;
    protected $jm;
    protected $km;
    protected $lm;

    public function __construct() {
        $this->rm = new \App\Models\RuangModel();
        $this->pjm = new \App\Models\PenanggungJawabModel();
        $this->km = new \App\Models\KegiatanModel();
        $this->lm = new \App\Models\LantaiModel();
        $this->jm = new \App\Models\JabatanModel();
    }

    public function index()
    {
        $data = [
            "title" => "Admin Dashboard",
        ];
        return view('admin/index', $data);
    }

    public function kegiatan()
    {
        return view("admin/kegiatan", [
            "title" => "Kegiatan",
            "ruang" => $this->rm->findAll(),
            "pj" => $this->pjm->findAll(),
            "lantai" => $this->lm->findAll(),
            "kegiatan" => $this->km->findAll()
        ]);
    }

    public function penanggung_jawab()
    {
        return view('admin/penanggung_jawab', [
            'title' => 'Penanggung Jawab',
            'pj' => $this->pjm->findAll(),
            'jabatan' => $this->jm->findAll(),
        ]);
    }

    public function jabatan()
    {
        return view('admin/jabatan', [
            "title" => "Data Jabatan",
            "jabatan" => $this->jm->findAll()
        ]);
    }

    public function ruang()
    {
        return view('admin/ruang', [
            "title" => "Data Ruang",
            "lantai" => $this->lm->findAll(),
            "ruang" => $this->rm->findAll()
        ]);
    }

}
