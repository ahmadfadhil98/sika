<?php

namespace App\Http\Livewire;

use App\Models\Angsuran;
use App\Models\Neraca as ModelsNeraca;
use App\Models\Pengeluaran;
use App\Models\Periode;
use App\Models\Post;
use App\Models\UangAsrama;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Neraca extends Component
{
    public $months=[];
    public $period=0;
    public $month=0;
    public $year;
    public $periodes;
    public $debitm;

    public function render()
    {
        $periode = Periode::select('id', DB::raw("CONCAT(if(period=1,concat(year-1,'/',year),concat(year,'/',year+1)),'-',if(period=1,'Semester 2','Semester 1')) AS semester"))->orderBy('id','desc')->pluck('semester','id');

        if($this->month){

            $tgl = DB::table('pengeluarans')->whereYear('tgl',$this->year)->whereMonth('tgl',$this->month)->select('tgl',DB::raw('SUM(harga) as kredit'),DB::raw("(select SUM(jumlah) from angsurans where angsurans.tgl=pengeluarans.tgl) as debit"))->groupBy('tgl')->paginate(7);
        }else{
            $tgl = [];
        }

        $ner = ModelsNeraca::where('periode_Id',$this->periodes)->where('month',$this->month-1)->get();
        // dd($ner);
        foreach ($ner as $n){
            $this->debitm = $n->uang_masuk - $n->pengeluaran;
        }

        $debt = DB::table('angsurans')->whereYear('tgl',$this->year)->whereMonth('tgl',$this->month)->select(DB::raw('SUM(jumlah) as debit'))->get();
        foreach ($debt as $d){
            $debit = $d->debit;
        }
        $kre = DB::table('pengeluarans')->whereYear('tgl',$this->year)->whereMonth('tgl',$this->month)->select(DB::raw('SUM(harga) as kredit'))->get();
        foreach ($kre as $k){
            $kredit = $k->kredit;
        }

        return view('livewire.report.neraca',[
            'tgl' => $tgl,
            'periode' => $periode,
            'debit' => $debit,
            'debitm' => $this->debitm,
            'kredit' => $kredit,
            'months' => $this->months
        ]);
    }

    public function month(){
        $periode = Periode::find($this->period);
        $this->periodes = $periode->id;
        $this->year = $periode->year;
        if($periode->period==1){
            $this->months = config('central.month1');
        }elseif($periode->period==2){
            $this->months = config('central.month2');
        }
    }
}
