<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsramaPeriode extends Model
{
    use HasFactory;

    protected $table = "asrama_periodes";
    protected $fillable = ['asrama_id','periode_id','binsis_id'];

    public function asrama(){
        return $this->belongsTo(Asrama::class);
    }

    public function periode(){
        return $this->belongsTo(Periode::class);
    }

    public function binsis(){
        return $this->belongsTo(GuruTendik::class);
    }

    public function dmurid(){
        return $this->hasMany(DetailMurid::class,'asrama_id','id');
    }
}
