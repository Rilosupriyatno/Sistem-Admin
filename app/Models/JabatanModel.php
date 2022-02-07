<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    // protected $table = 'users';
    // protected $allowedFields = ['NIK', 'foto', 'nama', 'templa', 'tangla', 'alamat', 'pendikte', 'id_jabatan', 'keterangan'];
    protected $table = 'jabatan';
    protected $allowedFields = ['id_jabatan', 'jabatan'];
}
