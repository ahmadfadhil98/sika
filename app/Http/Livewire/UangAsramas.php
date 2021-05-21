<?php

namespace App\Http\Livewire;

use App\Models\DetailMurid;
use App\Models\GuruTendik;
use App\Models\Periode;
use App\Models\UangAsrama;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UangAsramas extends Component
{

    public $isOpen = 0;
    public $murid_id,$jenis;
    public $uas = [];
    public $sem = [];

    public function render()
    {
        $periodes = Periode::select('id', DB::raw("CONCAT(if(period=1,concat(year-1,'/',year),concat(year,'/',year+1)),'-',if(period=1,'Semester 2','Semester 1')) AS semester"))->orderBy('id','desc')->pluck('semester','id');
        $guten = GuruTendik::pluck('name','id');
        return view('livewire.uangasrama.index',[
            'periodes' => $periodes,
            'guten' => $guten,
            'uas' => $this->uas
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->isOpen = false;
    }

    public function eksekusi(){
        // dd($this->jenis.'.asu');
        if($this->jenis=='asrama'){
            $this->uas = DB::table('asrama_periodes')
            ->join('asramas','asramas.id','asrama_periodes.asrama_id')
            ->select('asrama_periodes.id','asramas.name as askes','asrama_periodes.periode_id','asrama_periodes.asrama_id','asrama_periodes.binsis_id as pj')
            ->where('periode_id',$this->sem)
            ->get();
        }elseif($this->jenis=='kelas'){
            $this->uas = DB::table('kelas_periodes')
            ->join('kelas','kelas.id','kelas_periodes.kelas_id')
            ->select('kelas_periodes.id','kelas.name as askes','kelas_periodes.periode_id','kelas_periodes.kelas_id','kelas_periodes.walas_id as pj')
            ->where('periode_id',$this->sem)
            ->get();
        }


    }
}
