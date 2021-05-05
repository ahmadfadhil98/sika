<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use App\Models\Pengeluaran;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class Pengeluarans extends Component
{
    use WithFileUploads;
    public $spendId,$search,$isOpen,$photo;
    public $barang_id,$jumlah,$harga,$bukti;

    public function render()
    {
        $searchParam = '%'.$this->search.'%';
        $barangs = Barang::pluck('name','id');
        $spends = Pengeluaran::paginate(5);

        return view('livewire.pengeluaran.index',[
            'spends' => $spends,
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
                'barang_id' => 'required',
                'jumlah' => 'min:0',
                'harga'  => 'min:0'
            ]
        );

        // dd(date('Y-m-d'));
        $bukti = $this->storeImage();
        // dd($this->photo);
        try {
            Pengeluaran::updateOrCreate(['id' => $this->spendId], [
                'barang_id' => $this->barang_id,
                'jumlah' => $this->jumlah,
                'harga' => $this->harga,
                'bukti' => $bukti,
                'tgl' => date('Y-m-d')
            ]);
            session()->flash('info', $this->spendId ? 'Pengeluaran Update Successfully' : 'Pengeluaran Created Successfully' );
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplcate Entry');
            }
        }

        $this->hideModal();

        session()->flash('info', $this->spendId ? 'Pengeluaran Update Successfully' : 'Pengeluaran Created Successfully' );

        $this->spendId = '';
        $this->name = '';
    }

    public function edit($id){
        $spend = Pengeluaran::findOrFail($id);
        $this->spendId = $id;
        $this->barang_id = $spend->barang_id;
        $this->harga = $spend->harga;
        $this->jumlah = $spend->jumlah;
        $this->photo = $spend->bukti;

        $this->showModal();
    }

    public function delete($id){
        Pengeluaran::find($id)->delete();
        session()->flash('delete','Pengeluaran Successfully Deleted');
    }

    public function storeImage()
    {
        if (!$this->photo) {
            return null;
        }

        $img   = ImageManagerStatic ::make($this->photo)->encode('jpg');
        $name  = 'Bukti Pengeluaran Uang Asrama pada tanggal '.date('Y-m-d').'.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }

}
