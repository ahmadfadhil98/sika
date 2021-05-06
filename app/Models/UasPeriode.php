<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UasPeriode extends Model
{
    use HasFactory;
    protected $table = "uas_periodes";
    protected $fillable = ['periode_id','jumlah'];

    public function periode(){
        return $this->belongsTo(Periode::class);
    }
}
