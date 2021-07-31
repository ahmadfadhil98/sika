<?php

namespace App\Http\Livewire;

use App\Models\DetailMurid;
use App\Models\Kelas;
use App\Models\KelasPeriode;
use App\Models\Murid;
use App\Models\Periode;
use App\Models\UangAsrama;
use App\Models\UasPeriode;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class Tagihan extends Component
{
    public $kelas = [];
    public $period =[];
    public $murids = [];
    public $suas = 0;
    public $periodes,$kelass,$month,$months;
    public $dkelasId = 0;
    public $search;

    public function render()
    {
        $searchParams = '%'.$this->search.'%';
        $periode = Periode::select('id', DB::raw("CONCAT(if(period=1,concat(year-1,'/',year),concat(year,'/',year+1)),'-',if(period=1,'Semester 2','Semester 1')) AS semester"))->orderBy('id','desc')->pluck('semester','id');
        if($this->kelass!=[]){
            $dkelas = KelasPeriode::where('kelas_id',$this->kelass)->where('periode_id',$this->period)->get();
            foreach ($dkelas as $dk){
               $this->murids = DetailMurid::join('murids','murids.id','detail_murids.murid_id')->select('detail_murids.*','murids.name')->where('kelas_id',$dk->id)->where('murids.name','like',$searchParams)->get();
               $this->dkelasId = $dk->id;
            }

            $up = UasPeriode::where('periode_id',$this->period)->get();
            foreach ($up as $su){
                $this->suas = $su->jumlah;
            }
        }

        $murid = Murid::pluck('name','id');
        $uas = UangAsrama::get();
        // dd($this->suas);
        return view('livewire.report.tagihan',[
            'murids' => $this->murids,
            'murid' => $murid,
            'uas' => $uas,
            'dkelasId' => $this->dkelasId,
            'suas' => $this->suas,
            'periode' => $periode,
            'kelas' => $this->kelas,
            'months' => $this->months,
            'month' => $this->month
        ]);
    }

    public function kelas(){
        $this->periodes = Periode::find($this->period);
        $class = KelasPeriode::where('periode_id',$this->period)->get();
        $klas = [];
        foreach ($class as $c){
            array_push($klas,$c->kelas_id);
        }
        $this->kelas = Kelas::whereIn('id',$klas)->pluck('name','id');
        if($this->periodes->period==1){
            $this->months = [1,2,3,4,5,6];
            $this->month = config('central.month1');
        }else{
            $this->months = [7,8,9,10,11,12];
            $this->month = config('central.month2');
        }
    }
}
