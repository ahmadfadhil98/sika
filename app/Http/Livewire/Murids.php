<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Murid;
use Illuminate\Database\QueryException;

class Murids extends Component
{
    use WithPagination;

    public $search;
    public $muridId,$nis,$name,$genre;
    public $isOpen = 0;

    public function render()
    {
        $searchParams = '%'.$this->search.'%';
        $murids = Murid::where('name','like', $searchParams)->paginate(7);
        $gender = config('central.gender');
        return view('livewire.murid.index', [
            'murids' => $murids,
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
                'nis' => 'required',
                'name' => 'required',
                'genre' => 'required'
            ]
        );

        try {
            Murid::updateOrCreate(['id' => $this->muridId], [
                'nis' => $this->nis,
                'name' => $this->name,
                'genre' => $this->genre
            ]);
            session()->flash('info', $this->muridId ? 'Murid Update Successfully' : 'Murid Created Successfully' );
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'NIS sama');
            }
        }

        $this->hideModal();

        $this->muridId = '';
        $this->nis = '';
        $this->name = '';
        $this->genre = '';
    }

    public function edit($id){
        $murid = Murid::findOrFail($id);
        $this->muridId = $id;
        $this->nis = $murid->nis;
        $this->name = $murid->name;
        $this->genre = $murid->genre;

        $this->showModal();
    }

    public function delete($id){
        Murid::find($id)->delete();
        session()->flash('delete','Murid Successfully Deleted');
    }
}
