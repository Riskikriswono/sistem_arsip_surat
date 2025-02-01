<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;
    protected $table = 'surat_keluars';
    protected $primaryKey = 'id_sk';
    protected $fillable = ['user_id', 'tanggal', 'tujuan', 'nomorsurat', 'perihal', 'keterangan', 'dokumen'];
    public $timestamps = false;
}
