<?php

namespace App\Http\Livewire;

use App\Models\Angsuran;
use App\Models\Pengeluaran;
use App\Models\Periode;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Neraca extends Component
{
    public $months=[];
    public $period,$month;

    public function render()
    {
        $periode = Periode::select('id', DB::raw("CONCAT(if(period=1,concat(year-1,'/',year),concat(year,'/',year+1)),'-',if(period=1,'Semester 2','Semester 1')) AS semester"))->orderBy('id','desc')->pluck('semester','id');
        $debit = Angsuran::select(DB::raw('SUM(jumlah) as total_debit'))->get();
        $kredit = Pengeluaran::select(DB::raw('SUM(harga) as total_debit'))->get();
        if($this->month){
            $tgl = Angsuran::whereMonth('tgl',$this->month)->select('tgl')->paginate(7);
        }else{
            $tgl = Angsuran::paginate(7);
        }

        return view('livewire.report.report-masuk',[
            'tgl' => $tgl,
            'periode' => $periode,
            'debit' => $debit,
            'kredit' => $kredit,
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
