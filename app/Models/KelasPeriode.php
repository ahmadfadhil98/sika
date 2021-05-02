<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasPeriode extends Model
{
    use HasFactory;

    protected $table = "kelas_periodes";
    protected $fillable = ['kelas_id','periode_id','walas_id'];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function periode(){
        return $this->belongsTo(Periode::class);
    }

    public function walas(){
        return $this->belongsTo(GuruTendik::class);
    }

    public function dmurid(){
        return $this->hasMany(DetailMurid::class,'kelas_id','id');
    }
}
