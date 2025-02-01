<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapegawai extends Model
{
    use HasFactory;
    protected $table = 'datapegawais';
    protected $primaryKey = 'id_data';
    protected $fillable = ['user_id', 'nip', 'nama', 'nomortelepon', 'jeniskelamin', 'tanggal', 'jabatan', 'dokumen'];
    public $timestamps = false;
}
