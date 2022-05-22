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

    function statusKegiatanLive($tgl)
    {
        $time = new CodeIgniter\I18n\Time();

        // check date
        $tanggal = str_replace("T", " ", $tgl);
        $tanggal = explode(" ", $tgl);
        
        if ($tanggal[0] > $time->toDateString()) {
            $status = '<i class="far fa-calendar-alt text-warning" style="font-size:30px;"></i>';
        } elseif ($tanggal[0] == $time->toDateString()) {
            $status = '<i class="far fa-calendar-day text-info" style="font-size:30px;"></i>';
        } elseif ($tanggal[0] < $time->toDateString()) {
            $status = '<i class="fas fa-check-circle text-success" style="font-size:30px;"></i>';
        } else {
            $status = '<i class="far fa-ban text-dark" style="font-size:30px;"></i>';
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
            $status = '<i class="mx-1 text-warning far fa-calendar-alt" data-toggle="tooltip" title="akan datang"></i>';
        } elseif ($tanggal[0] == $time->toDateString()) {
            $status = '<i class="mx-1 text-info far fa-calendar-day" data-toggle="tooltip" title="hari ini"></i>';
        } elseif ($tanggal[0] < $time->toDateString()) {
            $status = '<i class="mx-1 text-success fas fa-check-circle" data-toggle="tooltip" title="selesai"></i>';
        } else {
            $status = '<i class="mx-1 text-dark far fa-ban" data-toggle="tooltip" title="unknown"></i>';
        }

        return $status;
    }

    function statusKegiatanColor($status, $tanggal)
    {
        $time = new CodeIgniter\I18n\Time();

        // check date
        $tanggal = str_replace("T", " ", $tanggal);
        $tanggal = explode(" ", $tanggal);

        if ($status == null) {
            if ($tanggal[0] > $time->toDateString()) {
                $bg = 'warning';
            } elseif ($tanggal[0] == $time->toDateString()) {
                $bg = 'info';
            } elseif ($tanggal[0] < $time->toDateString()) {
                $bg = 'success';
            } else {
                $bg = 'secondary';
            }
        } else {
            if ($status == 0) {
                $bg = 'danger';
            } elseif ($status == 1) {
                $bg = 'success';
            } elseif ($status == 2) {
                $bg = 'primary';
            } else {
                $bg = 'dark';
            }
        }

        return $bg;
    }

    function fullCalendarCustomColor($status, $tanggal)
    {
        $time = new CodeIgniter\I18n\Time();

        // check date
        $tanggal = str_replace("T", " ", $tanggal);
        $tanggal = explode(" ", $tanggal);

        if ($status == null) {
            if ($tanggal[0] > $time->toDateString()) {
                $bg = '#ffc107';
            } elseif ($tanggal[0] == $time->toDateString()) {
                $bg = '#3abaf4';
            } elseif ($tanggal[0] < $time->toDateString()) {
                $bg = '#63ed7a';
            } else {
                $bg = '#34395e';
            }
        } else {
            if ($status == 0) {
                $bg = '#fc544b';
            } elseif ($status == 1) {
                $bg = '#63ED76';
            } elseif ($status == 2) {
                $bg = '#6777ef';
            } else {
                $bg = '#191d21';
            }
        }

        return $bg;
    }
