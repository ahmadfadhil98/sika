<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GuruTendik;
use Illuminate\Database\QueryException;

class GuruTendiks extends Component
{
    use WithPagination;

    public $search;
    public $gurutendikId,$name,$genre;
    public $isOpen = 0;

    public function render()
    {
        $searchParams = '%'.$this->search.'%';
        $gurutendiks = GuruTendik::where('name','like', $searchParams)->paginate(7);
        $gender = config('central.gender');

        return view('livewire.gurutendik.index', [
            'gurutendiks' => $gurutendiks,
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
            GuruTendik::updateOrCreate(['id' => $this->gurutendikId], [
            'name' => $this->name,
            'genre' => $this->genre
            ]);
            session()->flash('info', $this->gurutendikId ? 'Guru/Tendik Update Successfully' : 'Guru/Tendik Created Successfully' );
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
            }
        }

        $this->hideModal();

        $this->gurutendikId = '';
        $this->name = '';
        $this->genre = '';
    }

    public function edit($id){
        $gurutendik = GuruTendik::findOrFail($id);
        $this->gurutendikId = $id;
        $this->name = $gurutendik->name;
        $this->genre = $gurutendik->genre;

        $this->showModal();
    }

    public function delete($id){
        GuruTendik::find($id)->delete();
        session()->flash('delete','GuruTendik Successfully Deleted');
    }
}
