<?php
    function statusKegiatan($tgl)
    {
        $time = new CodeIgniter\I18n\Time();

        // check date
        $tanggal = str_replace("T", " ", $tgl);
        $tanggal = explode(" ", $tgl);

        if ($tanggal[0] > $time->toDateString()) {
            $status = '<small class="bg-warning text-white p-1 rounded" data-toggle="tooltip" title="akan datang"><i class="mx-1 far fa-calendar-alt"></i></small>';
        } elseif ($tanggal[0] == $time->toDateString()) {
            $status = '<small class="bg-info text-white p-1 rounded" data-toggle="tooltip" title="hari ini"><i class="mx-1 far fa-calendar-day"></i></small>';
        } elseif ($tanggal[0] < $time->toDateString()) {
            $status = '<small class="bg-success text-white p-1 rounded" data-toggle="tooltip" title="selesai"><i class="mx-1 fas fa-check-circle"></i></small>';
        } else {
            $status = '<small class="bg-dark text-white p-1 rounded" data-toggle="tooltip" title="unknown"><i class="mx-1 far fa-ban"></i></small>';
        }

        return $status;
    }

    function statusKegiatanIconOnly($tgl)
    {
        $time = new CodeIgniter\I18n\Time();

        // check date
        $tanggal = str_replace("T", " ", $tgl);
        $tanggal = explode(" ", $tgl);

        if ($tanggal[0] > $time->toDateString()) {
            $status = '<i class="text-warning far fa-calendar-alt" data-toggle="tooltip" title="akan datang"></i>';
        } elseif ($tanggal[0] == $time->toDateString()) {
            $status = '<i class="text-info far fa-calendar-day" data-toggle="tooltip" title="hari ini"></i>';
        } elseif ($tanggal[0] < $time->toDateString()) {
            $status = '<i class="text-success fas fa-check-circle" data-toggle="tooltip" title="selesai"></i>';
        } else {
            $status = '<i class="text-dark far fa-ban" data-toggle="tooltip" title="unknown"></i>';
        }

        return $status;
    }
