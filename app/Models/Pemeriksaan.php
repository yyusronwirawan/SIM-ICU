<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;
    protected $table = "pemeriksaan";
    protected $fillable = ["id_pasien", "id_dokter", "kriteria", "hasil", "keputusan", "tanggal"];

    public function pasien()
    {
        return $this->belongsTo(Pengguna::class, 'id_pasien', 'Id_pasien')->first();
        // return $this->has(Pengguna::class, 'id_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter', 'id')->first();
        // return $this->has(User::class, 'id_dokter');
    }
}
