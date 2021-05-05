<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Asrama;
use Illuminate\Database\QueryException;
use DB;

class Asramas extends Component
{
    use WithPagination;

    public $jenis;
    public $gen = [];
    public $asramaId,$name,$genre,$search;
    public $isOpen = 0;

    public function render()
    {
        $searchParams = '%'.$this->search.'%';

        if($this->jenis=='1,2'){
             $this->gen = [1,2];
        }elseif($this->jenis==1){
             $this->gen = [1];
        }elseif($this->jenis==2){
             $this->gen = [2];
        }

        $gender = config('central.gender');
        $asramas = Asrama::where('name','like', $searchParams)
        ->whereIn('genre',$this->gen)->paginate(7);
        return view('livewire.asrama.index', [
            'asramas' => $asramas,
            'gender' => $gender
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
                'name' => 'required',
                'genre' => 'required'
            ]
        );

        try {
            Asrama::updateOrCreate(['id' => $this->asramaId], [
                'name' => $this->name,
                'genre' => $this->genre
            ]);
            session()->flash('info', $this->asramaId ? 'Asrama Update Successfully' : 'Asrama Created Successfully' );
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
            }
        }


        $this->hideModal();


        $this->asramaId = '';
        $this->name = '';
        $this->genre = '';
    }

    public function edit($id){
        $asrama = Asrama::findOrFail($id);
        $this->asramaId = $id;
        $this->name = $asrama->name;
        $this->genre = $asrama->genre;
        $this->showModal();
    }

    public function delete($id){
        Asrama::find($id)->delete();
        session()->flash('delete','Asrama Successfully Deleted');
    }
}
