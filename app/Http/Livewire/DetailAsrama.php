<?php

namespace App\Http\Livewire;

use App\Models\GuruTendik;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AsramaPeriode;
use App\Models\Asrama;
use App\Models\Periode;
use DB;
use Illuminate\Database\QueryException;

class DetailAsrama extends Component
{
    use WithPagination;

    public $search,$period;
    public $binsis = [];
    public $dasrama_id,$asrama_id,$periode_id,$binsis_id;
    public $isOpen = 0;

    public function render()
    {
        $searchParams = '%'.$this->search.'%';
        $asrama = Asrama::pluck('name','id');
        $pemas = GuruTendik::pluck('name','id');
        $periode = Periode::select('id', DB::raw("CONCAT(if(period=1,concat(year-1,'/',year),concat(year,'/',year+1)),'-',if(period=1,'Semester 2','Semester 1')) AS semester"))->orderBy('id','desc')->pluck('semester','id');
        $dasrama = DB::table('asrama_periodes')
        ->join('asramas','asramas.id','asrama_periodes.asrama_id')
        ->select('asrama_periodes.id','asramas.name as asrama','asrama_periodes.periode_id','asrama_periodes.asrama_id','asrama_periodes.binsis_id')
        ->where('asramas.name','like',$searchParams)
        ->where('periode_id',$this->period)
        ->paginate(5);

        return view('livewire.detailasrama.index', [
            'dasrama' => $dasrama,
            'asrama' => $asrama,
            'pemas' => $pemas,
            'binsis' => $this->binsis,
            'periode' => $periode
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function binsis(){

        $a = Asrama::find($this->asrama_id);
        // dd($a->genre);
        $this->binsis = GuruTendik::where('genre',$a->genre)->pluck('name','id');

    }

    public function hideModal() {
        $this->isOpen = false;
    }

    public function store(){
        $this->validate(
            [
                'periode_id' => 'required',
                'asrama_id' => 'required',
                'binsis_id' => 'required',
            ]
        );

        try {
            AsramaPeriode::updateOrCreate(['id' => $this->dasrama_id], [
                'periode_id' => $this->periode_id,
                'asrama_id' => $this->asrama_id,
                'binsis_id' => $this->binsis_id
            ]);
            session()->flash('info', $this->dasrama_id ? 'Detail Asrama Update Successfully' : 'Detail Asrama Created Successfully' );
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
            }
        }


        $this->hideModal();


        $this->dasrama_id = '';
        $this->periode_id = '';
        $this->asrama_id = '';
        $this->binsis_id = '';
    }

    public function edit($id){
        $asramaperiode = AsramaPeriode::findOrFail($id);
        $this->dasrama_id = $id;
        $this->periode_id = $asramaperiode->periode_id;
        $this->asrama_id = $asramaperiode->asrama_id;
        $this->binsis_id = $asramaperiode->binsis_id;

        $this->showModal();
    }

    public function delete($id){
        AsramaPeriode::find($id)->delete();
        session()->flash('delete','Detail Asrama Successfully Deleted');
    }
}
