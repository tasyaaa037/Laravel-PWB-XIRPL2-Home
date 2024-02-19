<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelass'; // Menentukan nama tabel
    protected $primaryKey = 'id_kelas'; // Menentukan nama kolom primary key
    protected $fillable = ['nama_kelas', 'kompetensi_keahlian'];
}