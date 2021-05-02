<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruTendik extends Model
{
    use HasFactory;

    protected $table = "guru_tendiks";
    protected $fillable = ['name','genre'];

    public function dkelas(){
        return $this->hasMany(KelasPeriode::class,'walas_id','id');
    }

    public function dasrama(){
        return $this->hasMany(AsramaPeriode::class,'binsis_id','id');
    }
}
