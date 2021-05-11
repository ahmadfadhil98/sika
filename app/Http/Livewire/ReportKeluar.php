<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use App\Models\Pengeluaran;
use App\Models\Periode;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReportKeluar extends Component
{
    public $months = [];
    public $period=0;
    public $month=0;
    public $year;

    public function render()
    {
        $periode = Periode::select('id', DB::raw("CONCAT(if(period=1,concat(year-1,'/',year),concat(year,'/',year+1)),'-',if(period=1,'Semester 2','Semester 1')) AS semester"))->orderBy('id','desc')->pluck('semester','id');
        $pengeluaran = DB::table('pengeluarans')->select('tgl',DB::raw('COUNT(id) as span'))->groupBy('tgl')->get();

        if($this->month){
            $tgl = DB::table('pengeluarans')->whereYear('tgl',$this->year)->whereMonth('tgl',$this->month)->paginate(7);
        }else{
            $tgl = Post::paginate(7);
        }
        $barang = Barang::pluck('name','id');
        $satuan = Barang::pluck('satuan','id');
        $peng =  Pengeluaran::pluck('barang_id','id');
        $jenis = Barang::pluck('jenis','id');
        $barangs = Barang::where('jenis','!=',2)->get();
        return view('livewire.report.report-keluar',[
            'periode' => $periode,
            'tgl' => $tgl,
            'barang' => $barang,
            'barangs' => $barangs,
            'satuan' => $satuan,
            'peng' => $peng,
            'jenis' => $jenis,
            'pengeluaran' => $pengeluaran,
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
