<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = "pengeluarans";
    protected $fillable = ['barang_id','jumlah','harga','keterangan','tgl'];

    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
