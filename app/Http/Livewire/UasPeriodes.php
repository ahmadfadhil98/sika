<?php

namespace App\Http\Livewire;

use App\Models\Periode;
use App\Models\UasPeriode;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UasPeriodes extends Component
{
    public $muasId,$periode_id,$jumlah;
    public $isOpen = 0;

    public function render()
    {
        $periode = Periode::select('id', DB::raw("CONCAT(if(period=1,concat(year-1,'/',year),concat(year,'/',year+1)),'-',if(period=1,'Semester 2','Semester 1')) AS semester"))->orderBy('id','desc')->pluck('semester','id');
        $muas = UasPeriode::paginate(7);
        return view('livewire.standaruas.index',[
            'periode' => $periode,
            'muas' => $muas
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->isOpen = false;
        $this->muasId = '';
        $this->periode_id = '';
        $this->jumlah = '';
    }

    public function store(){
        $this->validate(
            [
                'periode_id' => 'required',
                'jumlah' => 'required'
            ]
        );
        try {
            UasPeriode::updateOrCreate(['id' => $this->muasId], [
                'periode_id' => $this->periode_id,
                'jumlah' => $this->jumlah

            ]);
            session()->flash('info', $this->muasId ? 'Standar Uang Asrama Update Successfully' : 'Standar Uang Asrama Created Successfully' );
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplcate Entry');
            }
        }

        $this->hideModal();

        session()->flash('info', $this->muasId ? 'Standar Uang Asrama Update Successfully' : 'Standar Uang Asrama Created Successfully' );

    }

    public function edit($id){
        $muas = UasPeriode::findOrFail($id);
        $this->muasId = $id;
        $this->periode_id = $muas->periode_id;
        $this->jumlah = $muas->jumlah;

        $this->showModal();
    }

    public function delete($id){
        UasPeriode::find($id)->delete();
        session()->flash('delete','Standar Uang Asrama Successfully Deleted');
    }
}
