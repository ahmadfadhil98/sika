<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = "barangs";
    protected $fillable = ['name','satuan','jenis'];

    public function pengeluaran(){
        return $this->hasMany(Pengeluaran::class,'barang_id','id');
    }
}
