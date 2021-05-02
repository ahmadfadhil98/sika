<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table = "periodes";
    protected $fillable = ['year', 'period'];

    public function dkelas(){
        return $this->hasMany(KelasPeriode::class,'periode_id','id');
    }

    public function dasrama(){
        return $this->hasMany(AsramaPeriode::class,'periode_id','id');
    }
}
