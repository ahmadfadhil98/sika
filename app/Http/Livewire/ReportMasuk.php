<?php

namespace App\Http\Livewire;

use App\Models\Angsuran;
use App\Models\DetailMurid;
use App\Models\Kelas;
use App\Models\KelasPeriode;
use App\Models\Murid;
use App\Models\Periode;
use App\Models\UangAsrama;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class ReportMasuk extends Component
{
    public $months=[];
    public $period,$month;

    public function render()
    {
        $periode = Periode::select('id', DB::raw("CONCAT(if(period=1,concat(year-1,'/',year),concat(year,'/',year+1)),'-',if(period=1,'Semester 2','Semester 1')) AS semester"))->orderBy('id','desc')->pluck('semester','id');
        $murid = Murid::pluck('name','id');
        $kelas = Kelas::pluck('name','id');
        $uas_id = Angsuran::pluck('uas_id','id');
        $uas_dmurid = UangAsrama::pluck('murid_id','id');
        $dmurid = DetailMurid::pluck('murid_id','id');
        $dmuridkelas = DetailMurid::pluck('kelas_id','id');
        $dkelas = KelasPeriode::pluck('kelas_id','id');

        if($this->month){
            $tgl = Angsuran::whereMonth('tgl',$this->month)->select('id','tgl','uas_id','jumlah')->paginate(7);
        }else{
            $tgl = Angsuran::paginate(7);
        }

        return view('livewire.report.report-masuk',[
            'tgl' => $tgl,
            'periode' => $periode,
            'murid' => $murid,
            'kelas' => $kelas,
            'uas_id' => $uas_id,
            'uas_dmurid' => $uas_dmurid,
            'dmurid' => $dmurid,
            'dmuridkelas' => $dmuridkelas,
            'dkelas' => $dkelas,
            'months' => $this->months
        ]);
    }

    public function month(){
        $periode = $this->period;
        if($periode==1){
            $this->months = config('central.month1');
        }elseif($periode==2){
            $this->months = config('central.month2');
        }
    }
}
