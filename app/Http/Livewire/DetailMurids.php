<?php

namespace App\Http\Livewire;

use App\Models\AsramaPeriode;
use App\Models\DetailMurid;
use App\Models\KelasPeriode;
use App\Models\Murid;
use App\Models\Periode;
use App\Models\UangAsrama;
use DateTime;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class DetailMurids extends Component
{
    use WithFileUploads;
    public $dmuridId,$di,$mon,$photo;
    public $murid_id,$tgl,$bulan,$jumlah,$keterangan;
    public $isOpen = 0;

    public function mount($id,$di){

        $this->dmuridId = $id;
        $this->di = $di;
    }

    public function render()
    {
        $dmurid = DetailMurid::find($this->dmuridId);

        if($this->di==21){
            $asramas = AsramaPeriode::find($dmurid->asrama_id);
            $periodes = Periode::find($asramas->periode_id);
            $period = $periodes->period;

        }elseif($this->di==31){
            $kelas = KelasPeriode::find($dmurid->kelas_id);
            $periodes = Periode::find($kelas->periode_id);
            $period = $periodes->period;
        }

        if($period==1){
            $months = [1,2,3,4,5,6];
        }else{
            $months = [7,8,9,10,11,12];
        }

        $month = config('central.month');
        $uas = UangAsrama::where('murid_id',$this->dmuridId)
        ->get();
        $murid = Murid ::pluck('name','id');
        return view('livewire.detailmurid.index',[
            'uas' => $uas,
            'month' => $month,
            'months' => $months,
            'murid' => $murid,
            'dmurid' => $dmurid
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->isOpen = false;
    }

    public function create(){
        $this->murid_id = $this->dmuridId;

        $this->showModal();
    }

    public function store()
    {
        dd($this->photo);
        $dmurid = DetailMurid::find($this->dmuridId);
        $bukti = $this->storeImage();
        $dmurid->uang_asrama()->updateorCreate([
            'month' => $this->bulan,
            'keterangan' => $this->keterangan,
            'bukti' => $bukti,
            'jumlah' => $this->jumlah,
            'tgl' => date("Y-m-d")
        ]);

    }

    public function storeImage()
    {
        if (!$this->photo) {
            return null;
        }
        $dmurid = DetailMurid::find($this->dmuridId);
        $murids = Murid::pluck('name','id');
        $murid = $murids[$dmurid->murid_id];
        $img   = ImageManagerStatic::make($this->photo)->encode('jpg');
        $name  = 'Bukti Pembayaran Uang Asrama '.$murid.' di bulan'.$this->bulan.'.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }
}
