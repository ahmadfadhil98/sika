<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kelas;
use Illuminate\Database\QueryException;

class Kelases extends Component
{
    use WithPagination;

    public $search;
    public $kelasId,$name;
    public $isOpen = 0;

    public function render()
    {
        $searchParams = '%'.$this->search.'%';
        $kelases = Kelas::where('name','like', $searchParams)->paginate(7);

        return view('livewire.kelas.index', [
            'kelases' => $kelases
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->kelasId = '';
        $this->name = '';
        $this->isOpen = false;
    }

    public function store(){
        $this->validate(
            [
                'name' => 'required',
            ]
        );
        try {
            Kelas::updateOrCreate(['id' => $this->kelasId], [
                'name' => $this->name
            ]);
            session()->flash('info', $this->kelasId ? 'Kelas Update Successfully' : 'Kelas Created Successfully' );
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplcate Entry');
            }
        }

        $this->hideModal();

        session()->flash('info', $this->kelasId ? 'Kelas Update Successfully' : 'Kelas Created Successfully' );

    }

    public function edit($id){
        $kelas = Kelas::findOrFail($id);
        $this->kelasId = $id;
        $this->name = $kelas->name;

        $this->showModal();
    }

    public function delete($id){
        Kelas::find($id)->delete();
        session()->flash('delete','Kelas Successfully Deleted');
    }
}
