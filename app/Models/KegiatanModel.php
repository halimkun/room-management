<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table            = 'kegiatan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["agenda", "ruang", "tanggal", "time", "pj", "keterangan", "status"];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    function getKegiatanToday($tanggal) {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where("DATE(tanggal)", $tanggal);

        return $builder->get()->getResultObject();
    }

    public function getNext7Days($start, $end)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where("DATE(tanggal) >=", $start);
        $builder->where("DATE(tanggal) <=", $end);

        return $builder->get()->getResultObject();
    }

    public function getPrev7Days($start, $end)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where("DATE(tanggal) <=", $start);
        $builder->where("DATE(tanggal) >=", $end);

        return $builder->get()->getResultObject();
    }
}
