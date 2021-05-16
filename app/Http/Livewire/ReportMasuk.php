<?php

namespace App\Http\Livewire;

use App\Models\Angsuran;
use App\Models\DetailMurid;
use App\Models\Kelas;
use App\Models\KelasPeriode;
use App\Models\Murid;
use App\Models\Periode;
use App\Models\Post;
use App\Models\UangAsrama;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class ReportMasuk extends Component
{
    public $months=[];
    public $period=0;
    public $month=0;
    public $year;

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

        $angsuran = DB::table('angsurans')->select('tgl',DB::raw('COUNT(id) as span'))->groupBy('tgl')->get();
        if($this->month){
            $tgl = DB::table('angsurans')->whereYear('tgl',$this->year)->whereMonth('tgl',$this->month)->select('tgl','uas_id','jumlah')->orderByDesc('tgl')->get();
        }else{
            $tgl = [];
        }

        $debt = DB::table('angsurans')->whereYear('tgl',$this->year)->whereMonth('tgl',$this->month)->select(DB::raw('SUM(jumlah) as debit'))->get();
        foreach ($debt as $d){
            $debit = $d->debit;
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
            'debit' => $debit,
            'angsuran' => $angsuran,
            'months' => $this->months
        ]);
    }

    public function month(){
        $periode = Periode::find($this->period);
        $this->year = $periode->year;
        if($periode->period==1){
            $this->months = config('central.month1');
        }elseif($periode->period==2){
            $this->months = config('central.month2');
        }
    }
}
