<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use Livewire\Component;

class CreatePengeluarans extends Component
{
    public $barang_id = [];
    public $harga,$jumlah,$spendId;

    public function render()
    {
        $barangs = Barang::get();
        return view('livewire.pengeluaran.create',[
            'barangs' => $barangs
        ]);
    }

    public function store(){
        dd($this->barang_id);
    }
}
