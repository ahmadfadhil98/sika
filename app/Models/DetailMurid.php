<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMurid extends Model
{
    use HasFactory;

    protected $table = "detail_murids";
    protected $fillable = ['murid_id','kelas_id','asrama_id'];

    public function asrama(){
        return $this->belongsTo(AsramaPeriode::class);
    }

    public function murid(){
        return $this->belongsTo(Murid::class);
    }

    public function kelas(){
        return $this->belongsTo(KelasPeriode::class);
    }

    public function uang_asrama(){
        return $this->hasMany(UangAsrama::class,'murid_id','id');
    }
}
