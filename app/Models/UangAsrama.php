<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UangAsrama extends Model
{
    use HasFactory;

    protected $table = "uang_asramas";
    protected $fillable = ['murid_id','month','keterangan','bukti','jumlah','tgl',];

    public function murid(){
        return $this->belongsTo(DetailMurid::class);
    }
}
