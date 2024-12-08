<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;
    protected $fillable = ['nama_pelajaran'];
    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'mata_pelajaran_id');
    }

    // Relasi ke model Materi
    public function materi()
    {
        return $this->hasMany(Materi::class, 'mata_pelajaran_id');
    }
}
