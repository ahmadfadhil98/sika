<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asrama extends Model
{
    use HasFactory;

    protected $table = "asramas";
    protected $fillable = ['name','genre'];

    public function dasrama(){
        return $this->hasMany(AsramaPeriode::class,'asrama_id','id');
    }
}
