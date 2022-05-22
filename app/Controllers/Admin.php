<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class Admin extends BaseController
{
    protected $rm;
    protected $pjm;
    protected $jm;
    protected $km;
    protected $lm;
    protected $time;


    public function __construct()
    {
        $this->rm = new \App\Models\RuangModel();
        $this->pjm = new \App\Models\PenanggungJawabModel();
        $this->km = new \App\Models\KegiatanModel();
        $this->lm = new \App\Models\LantaiModel();
        $this->jm = new \App\Models\JabatanModel();
        $this->time = new Time();
    }

    public function index()
    {
        return view('admin/index', [
            "title" => "Admin Dashboard",
            "kegiatan" => $this->km->findAll(),
            "today" => $this->km->getKegiatanToday($this->time->format('Y-m-d')),
            "next7days" => $this->km->getNext7Days($this->time->toDateString(), $this->time->addDays(6)->toDateString()),
            "prev7days" => $this->km->getPrev7Days($this->time->toDateString(), $this->time->addDays(-6)->toDateString()),
            "pj" => $this->pjm->findAll(),
            "ruang" => $this->rm->findAll(),
            "lantai" => $this->lm->findAll(),
        ]);
    }

    public function kegiatan()
    {
        return view("admin/kegiatan", [
            "title" => "Kegiatan",
            "ruang" => $this->rm->findAll(),
            "pj" => $this->pjm->findAll(),
            "lantai" => $this->lm->findAll(),
            "kegiatan" => $this->km->orderBy('tanggal', "DESC")->findAll()
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
