<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neraca extends Model
{
    use HasFactory;
    protected $table = "neracas";
    protected $fillable = ['periode_id','month','uang_masuk','pengeluaran'];

    public function periode(){
        return $this->belongsTo(Periode::class);
    }
}
