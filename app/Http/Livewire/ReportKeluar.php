<?php

namespace App\Http\Livewire;

use App\Models\Pengeluaran;
use App\Models\Periode;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReportKeluar extends Component
{
    public $months = [];
    public $month,$period;

    public function render()
    {
        $periode = Periode::select('id', DB::raw("CONCAT(if(period=1,concat(year-1,'/',year),concat(year,'/',year+1)),'-',if(period=1,'Semester 2','Semester 1')) AS semester"))->orderBy('id','desc')->pluck('semester','id');

        if($this->month){
            $tgl = Pengeluaran::paginate(7);
        }else{
            $tgl = Post::paginate(7);
        }

        return view('livewire.report.report-keluar',[
            'periode' => $periode,
            'tgl' => $tgl,
            'months' => $this->months
        ]);
    }

    public function month(){
        $periode = Periode::find($this->period);

        if($periode->period==1){
            $this->months = config('central.month1');
        }elseif($periode->period==2){
            $this->months = config('central.month2');
        }
    }
}
