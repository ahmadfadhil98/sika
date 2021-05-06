<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    use HasFactory;

    protected $table = "angsurans";
    protected $fillable = ['uas_id','no','jumlah','tgl','keterangan'];

    public function uas(){
        return $this->belongsTo(UangAsrama::class);
    }
}
