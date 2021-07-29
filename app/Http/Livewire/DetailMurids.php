<?php

namespace App\Http\Livewire;

use App\Models\Angsuran;
use App\Models\AsramaPeriode;
use App\Models\DetailMurid;
use App\Models\KelasPeriode;
use App\Models\Murid;
use App\Models\Periode;
use App\Models\UangAsrama;
use App\Models\UasPeriode;
use DateTime;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class DetailMurids extends Component
{
    use WithFileUploads;
    public $keterangan1,$bulan,$jumlahuas;
    public $no,$jumlahang,$tgl,$uas_id,$keterangan2;
    public $dmuridId,$di,$jumlah,$uasId,$ketuas,$dinfoId;
    public $isOpen = 0;
    public $isInfo = 0;
    public $angsur;
    public $mont;

    public function mount($id,$di){

        $this->dmuridId = $id;
        $this->di = $di;
    }

    public function render()
    {

        $dmurid = DetailMurid::find($this->dmuridId);
        // dd($dmurid);
        if($this->di==21){
            $asramas = AsramaPeriode::find($dmurid->asrama_id);
            $periodes = Periode::find($asramas->periode_id);
            $period = $periodes->period;

        }elseif($this->di==31){
            $kelas = KelasPeriode::find($dmurid->kelas_id);
            $periodes = Periode::find($kelas->periode_id);
            $period = $periodes->period;
        }
        $periode = Periode::select('id', DB::raw("CONCAT(if(period=1,concat(year-1,'/',year),concat(year,'/',year+1)),'-',if(period=1,'Semester 2','Semester 1')) AS semester"))->orderBy('id','desc')->pluck('semester','id');

        if($period==1){
            $months = [1,2,3,4,5,6];
            $month = config('central.month1');
        }else{
            $months = [7,8,9,10,11,12];
            $month = config('central.month2');
        }
        $uas = UangAsrama::where('murid_id',$this->dmuridId)
        ->get();
        $uasperiode = UasPeriode::where('periode_id',$periodes->id)->get();
        $murid = Murid ::pluck('name','id');
        return view('livewire.detailmurid.index',[
            'uas' => $uas,
            'periodes' => $periodes,
            'periode' => $periode,
            'month' => $month,
            'uasperiode' => $uasperiode,
            'months' => $months,
            'murid' => $murid,
            'dmurid' => $dmurid
        ]);
    }

    public function today(){
        $this->tgl = date('Y-m-d');
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->bulan = '';
        $this->tgl = '';
        $this->keterangan1 = '';
        $this->keterangan2 = '';
        $this->jumlah = '';
        $this->dinfoId = '';
        $this->isOpen = false;
    }

    public function showInfo() {
        $this->isInfo = true;
    }

    public function hideInfo() {
        $this->angsur = [];
        $this->isInfo = false;
    }

    public function create(){
        $this->murid_id = $this->dmuridId;

        $this->showModal();
    }

    public function edit($id){
        $angsuran = Angsuran::find($id);
        $ua = UangAsrama::find($angsuran->uas_id);
        $this->dinfoId = $angsuran->id;
        $this->tgl = $angsuran->tgl;
        $this->jumlah = $angsuran->jumlah;
        $this->bulan = $ua->month;
        $this->keterangan1 = $ua->keterangan;
        $this->keterangan2 = $angsuran->keterangan;
        $this->hideInfo();
        $this->showModal();
    }

    public function show($mont){
        $this->mont = $mont;
        $uas = UangAsrama::where('murid_id',$this->dmuridId)->where('month',$mont)->get();

        foreach ($uas as $u){
            $this->angsur = Angsuran::where('uas_id',$u->id)->get();
        $this->ketuas = $u->keterangan;
        }
        $this->showInfo();
    }

    public function store()
    {
        $this->validate(
            [
                'jumlah' => 'required',
                'tgl' => 'required',
                'bulan' => 'required',
                'keterangan1' => 'required',
            ]
        );

        $dmurid = DetailMurid::find($this->dmuridId);
        $uas = UangAsrama::where('murid_id',$this->dmuridId)->where('month',$this->bulan)->get();

        if(count($uas)==0){
            $dmurids = UangAsrama::create([
                'murid_id' => $this->dmuridId,
                'keterangan' => $this->keterangan1,
                'month' => $this->bulan,
                'jumlah' => $this->jumlah
            ]);
            $angsuran = Angsuran::create([
                'uas_id' => $dmurids->id,
                'tgl' => $this->tgl,
                'jumlah' => $this->jumlah,
                'keterangan' => $this->keterangan2,
                'no' => 1
            ]);

        }else{
            foreach($uas as $u){
                $uas_id = $u->id;
                $angsurans = Angsuran::where('uas_id',$uas_id)->get();
                $no = count($angsurans);

                if($this->dinfoId){
                    $angsuran =  Angsuran::where('id',$this->dinfoId)->update([
                        'uas_id' => $uas_id,
                        'tgl' => $this->tgl,
                        'jumlah' => $this->jumlah,
                        'keterangan' => $this->keterangan2,
                    ]);
                }else{
                    $angsuran = Angsuran::create([
                        'uas_id' => $uas_id,
                        'tgl' => $this->tgl,
                        'jumlah' => $this->jumlah,
                        'keterangan' => $this->keterangan2,
                        'no' => $no+1
                    ]);
                }

                $angsuran = Angsuran::select(DB::raw('SUM(jumlah) as debit'))->where('uas_id',$uas_id)->get();
                $debit = $angsuran[0]->debit;

                $dmurids = UangAsrama::where('id',$uas_id)->update([
                    'keterangan' => $this->keterangan1,
                    'jumlah' => $debit,
                ]);

            }
        }

        session()->flash('info', 'Uang Asrama Oke' );

        $this->hideModal();
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
