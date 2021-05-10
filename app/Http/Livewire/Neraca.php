<?php

namespace App\Http\Livewire;

use App\Models\Angsuran;
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

    public function render()
    {
        $periode = Periode::select('id', DB::raw("CONCAT(if(period=1,concat(year-1,'/',year),concat(year,'/',year+1)),'-',if(period=1,'Semester 2','Semester 1')) AS semester"))->orderBy('id','desc')->pluck('semester','id');

        $debit = Angsuran::select(DB::raw('SUM(jumlah) as debit'));
        $kredit = Pengeluaran::select(DB::raw('SUM(harga) as kredit'));

        if($this->month){

            $tgl = DB::table('pengeluarans')->whereYear('tgl',$this->year)->whereMonth('tgl',$this->month)->select('tgl',DB::raw('SUM(harga) as kredit'),DB::raw("(select SUM(jumlah) from angsurans where angsurans.tgl=pengeluarans.tgl) as debit"))->groupBy('tgl')->paginate(7);

            // $t = DB::table('pengeluarans')->whereYear('tgl',$this->year)->whereMonth('tgl',$this->month)->select('tgl',DB::raw('null as debit'),DB::raw('SUM(harga) as kredit'))->groupBy('tgl')->get();

            // $tgl = DB::table('angsurans')->whereYear('tgl',$this->year)->whereMonth('tgl',$this->month)->select('tgl',DB::raw('SUM(jumlah) as debit'),DB::raw('null as kredit'))->groupBy('tgl')->union($t)->paginate(7);
        }else{
            $tgl = Post::paginate(5);
        }
        // dd($tgl);
        return view('livewire.report.neraca',[
            'tgl' => $tgl,
            'periode' => $periode,
            'debit' => $debit,
            'kredit' => $kredit,
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
