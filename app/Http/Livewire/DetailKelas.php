<?php

namespace App\Http\Livewire;

use App\Models\GuruTendik;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KelasPeriode;
use App\Models\Kelas;
use App\Models\Periode;
use DB;
use Illuminate\Database\QueryException;

class DetailKelas extends Component
{
    use WithPagination;

    public $search,$period;
    public $dkelas_id,$kelas_id,$periode_id,$walas_id;
    public $isOpen = 0;

    public function render()
    {
        $searchParams = '%'.$this->search.'%';
        $kelas = Kelas::pluck('name','id');
        $walas = GuruTendik::pluck('name','id');
        $periode = Periode::select('id', DB::raw("CONCAT(if(period=1,concat(year-1,'/',year),concat(year,'/',year+1)),'-',if(period=1,'Semester 2','Semester 1')) AS semester"))->orderBy('id','desc')->pluck('semester','id');
            $dkelas = DB::table('kelas_periodes')
                ->join('kelas','kelas.id','kelas_periodes.kelas_id')
                ->select('kelas_periodes.id','kelas.name as kelas','kelas_periodes.periode_id','kelas_periodes.kelas_id','kelas_periodes.walas_id')
                ->where('kelas.name','like',$searchParams)
                ->where('periode_id',$this->period)
            ->paginate(5);

            return view('livewire.detailkelas.index', [
            'dkelas' => $dkelas,
            'kelas' => $kelas,
            'walas' => $walas,
            'periode' => $periode
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->isOpen = false;
    }

    public function store(){
        $this->validate(
            [
                'periode_id' => 'required',
                'kelas_id' => 'required',
                'walas_id' => 'required',
            ]
        );

        try {
            KelasPeriode::updateOrCreate(['id' => $this->dkelas_id], [
                'periode_id' => $this->periode_id,
                'kelas_id' => $this->kelas_id,
                'walas_id' => $this->walas_id
            ]);
            session()->flash('info', $this->dkelas_id ? 'Detail Kelas Update Successfully' : 'Detail Kelas Created Successfully' );
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
            }
        }


        $this->hideModal();


        $this->dkelas_id = '';
        $this->periode_id = '';
        $this->kelas_id = '';
        $this->walas_id = '';
    }

    public function edit($id){
        $kelasperiode = KelasPeriode::findOrFail($id);
        $this->dkelas_id = $id;
        $this->periode_id = $kelasperiode->periode_id;
        $this->kelas_id = $kelasperiode->kelas_id;
        $this->walas_id = $kelasperiode->walas_id;

        $this->showModal();
    }

    public function delete($id){
        KelasPeriode::find($id)->delete();
        session()->flash('delete','KelasPeriode Successfully Deleted');
    }
}
