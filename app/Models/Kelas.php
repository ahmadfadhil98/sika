<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = "kelas";
    protected $fillable = ['name'];

    public function dkelas(){
        return $this->hasMany(KelasPeriode::class,'kelas_id','id');
    }
}
