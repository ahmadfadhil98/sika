<?php

namespace App\Http\Livewire;

use App\Models\DetailMurid;
use App\Models\Kelas;
use App\Models\KelasPeriode;
use App\Models\Murid;
use App\Models\Periode;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $search;

    public function render()
    {
        $kelas=[];
        $searchParam = '%'.$this->search.'%';
        $year = date('Y');
        $month = date('m');
        if($month<7){
            $period = 1;
        }elseif($month>6){
            $period = 2;
        }

        $semester = Periode::where('year',$year)->where('period',$period)->get();

        foreach($semester as $smt) {
            $kelas = KelasPeriode::where('periode_id',$smt->id)->get();
        }
        $kelasId = [];
        foreach($kelas as $k){
            array_push($kelasId,$k->id);
        }
        $dkelas = KelasPeriode::pluck('kelas_id','id');
        $n_kelas = Kelas::pluck('name','id');

        $murids = DB::table('detail_murids')->join('murids','murids.id','detail_murids.murid_id')->select('detail_murids.id','detail_murids.kelas_id','murids.name','murids.nis')->where('murids.name','like',$searchParam)->whereIn('kelas_id',$kelasId)->orderBy('murids.nis')->paginate(7);
        $name = Murid::pluck('name','id');
        $nis = Murid::pluck('nis','id');
        return view('livewire.dashboard',[
            'murids' => $murids,
            'name' => $name,
            'dkelas' => $dkelas,
            'n_kelas' => $n_kelas,
            'nis' => $nis
        ]);
    }
}
