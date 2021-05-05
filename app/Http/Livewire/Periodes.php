<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Periode;
use Illuminate\Database\QueryException;

class Periodes extends Component
{
    use WithPagination;

    public $search;
    public $periodeId,$year,$period;
    public $isOpen = 0;

    public function render()
    {
        $searchParams = '%'.$this->search.'%';
        $periodes = Periode::where('year','like', $searchParams)->latest()
        ->paginate(7);
        $period = config('central.period');

        return view('livewire.periode.index', [
            'periodes' => $periodes,
            'semester' => $period
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
                'year' => 'required',
                'period' => 'required',
            ]
        );
        try {
            Periode::updateOrCreate(['id' => $this->periodeId], [
                'year' => $this->year,
                'period' => $this->period
            ]);
            session()->flash('info', $this->periodeId ? 'Periode Update Successfully' : 'Periode Created Successfully' );
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
            }
        }

        $this->hideModal();

        $this->periodeId = '';
        $this->year = '';
        $this->period = '';
    }

    public function edit($id){
        $periode = Periode::findOrFail($id);
        $this->periodeId = $id;
        $this->year = $periode->year;
        $this->period = $periode->period;

        $this->showModal();
    }

    public function delete($id){
        Periode::find($id)->delete();
        session()->flash('delete','Periode Successfully Deleted');
    }
}
