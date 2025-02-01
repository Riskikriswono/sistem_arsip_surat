<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    protected $table = 'surat_masuks';
    protected $primaryKey = 'id_sm';
    protected $fillable = ['user_id', 'tanggal', 'pengirim', 'nomorsurat', 'perihal', 'keterangan', 'dokumen'];
    public $timestamps = false;
}
