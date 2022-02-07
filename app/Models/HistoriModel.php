<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriModel extends Model
{
    // protected $table = 'users';
    // protected $allowedFields = ['NIK', 'foto', 'nama', 'templa', 'tangla', 'alamat', 'pendikte', 'id_jabatan', 'keterangan'];
    protected $table = 'histori';
    protected $useTimeStamps = true;
    protected $allowedFields = ['id', 'NIK', 'id_jabatan', 'no_sk', 'sk', 'tgl_mulai', 'tgl_berakhir', 'creator', 'updator'];

    public function search($keyword)
    {
        // $builder = $this->table('data_pegawai');
        // $builder->like('nama', $keyword);
        return $this->table('histori')->like('NIK', $keyword);
    }
}
