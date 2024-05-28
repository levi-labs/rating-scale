<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    protected $guarded = ['id'];

    public function indikators()
    {
        return $this->belongsTo(Indikator::class, 'indikator_id', 'id');
    }
    public function pegawais()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }
}
