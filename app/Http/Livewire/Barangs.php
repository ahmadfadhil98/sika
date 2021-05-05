<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Barangs extends Component
{
    public $name,$satuan;
    public $jenis = 1;
    public $barangId,$search,$isOpen;

    public function render()
    {
        $searchParam = '%'.$this->search.'%';
        $barangs = Barang::where('name','like',$searchParam)->paginate(5);
        return view('livewire.barang.index',[
            'barangs' => $barangs
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
                'satuan' => 'required'
            ]
        );

        try {
            Barang::updateOrCreate(['id' => $this->barangId], [
                'name' => $this->name,
                'satuan' => $this->satuan,
                'jenis' => $this->jenis
            ]);
            session()->flash('info', $this->barangId ? 'barang Update Successfully' : 'barang Created Successfully' );
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
            }
        }


        $this->hideModal();


        $this->barangId = '';
        $this->name = '';
        $this->satuan = '';
        $this->jenis = '';
    }

    public function edit($id){
        $barang = Barang::findOrFail($id);
        $this->barangId = $id;
        $this->name = $barang->name;
        $this->satuan = $barang->satuan;
        $this->jenis = $barang->jenis;
        $this->showModal();
    }

    public function delete($id){
        Barang::find($id)->delete();
        session()->flash('delete','Barang Successfully Deleted');
    }
}
