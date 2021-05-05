<?php

namespace App\Http\Livewire;

use App\Models\Periode;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReportMasuk extends Component
{
    public function render()
    {
        $periode = Periode::select('id', DB::raw("CONCAT(if(period=1,concat(year-1,'/',year),concat(year,'/',year+1)),'-',if(period=1,'Semester 2','Semester 1')) AS semester"))->orderBy('id','desc')->pluck('semester','id');
        $year = Periode::pluck('id','year');
        $period = Periode::pluck('id','period');

        $month = config('central.month');

        // if($period == 1){
        //     $m = [1,2,3,4,5,6];
        //     $month = config('central.month');

        // }elseif($period==2){
        //     $m = [7,8,9,10,11,12];
        // }
        dd(array_slice($month,6,11));
        return view('livewire.report.report-masuk',[
            'periode' => $periode,

        ]);
    }
}
