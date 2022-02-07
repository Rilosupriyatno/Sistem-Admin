<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    // protected $table = 'users';
    // protected $allowedFields = ['NIK', 'foto', 'nama', 'templa', 'tangla', 'alamat', 'pendikte', 'id_jabatan', 'keterangan'];
    protected $table = 'data_pegawai';
    protected $useTimeStamps = true;
    protected $allowedFields = ['id', 'NIK', 'nama', 'jenkel', 'foto', 'tanggal_lahir', 'alamat', 'pendikte', 'deleted_at'];
    protected $useSoftDeletes = true;
    public function data()
    {
        $data = $this->table('data_pegawai')->countAll();

        return $data;
    }
    public function getPegawai($id)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }
    public function search($keyword)
    {
        // $builder = $this->table('data_pegawai');
        // $builder->like('nama', $keyword);
        return $this->table('data_pegawai')->like('nama', $keyword);
    }
}
