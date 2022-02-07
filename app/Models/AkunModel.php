<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    // protected $table = 'users';
    // protected $allowedFields = ['NIK', 'foto', 'nama', 'templa', 'tangla', 'alamat', 'pendikte', 'id_jabatan', 'keterangan'];
    protected $table = 'users';
    protected $useTimeStamps = true;
    protected $allowedFields = ['username', 'user_image', 'fullname'];
}
