<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use ErrorException;
use Exception;

class Home extends BaseController
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
        return view('index',[
            "title" => "Aktifitas",
            "today" => $this->km->getKegiatanToday($this->time->format('Y-m-d')),
        ]);
    }

    public function test()
    {
        // return view('test',[
        //     "title" => "Aktifitas",
        //     "kegiatan" => $this->km->getKegiatanToday($this->time->format('Y-m-d')),
        // ]);

        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    public function kegiatan()
    {
        return view('kegiatan',[
            "title" => " ",
            "pj" => $this->pjm->findAll(),
            "ruang" => $this->rm->findAll(),
            "lantai" => $this->lm->findAll(),
            "kegiatan" => $this->km->findAll(),
            "today" => $this->km->getKegiatanToday($this->time->format('Y-m-d')),
            "next7days" => $this->km->getNext7Days($this->time->toDateString(), $this->time->addDays(6)->toDateString()),
            "prev7days" => $this->km->getPrev7Days($this->time->toDateString(), $this->time->addDays(-6)->toDateString()),
            "today" => $this->km->getKegiatanToday($this->time->format('Y-m-d')),
        ]);
    }
}
