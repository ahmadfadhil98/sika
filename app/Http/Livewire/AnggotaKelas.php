<?php

namespace App\Http\Livewire;

use App\Models\AsramaPeriode;
use App\Models\DetailMurid;
use App\Models\Kelas;
use App\Models\KelasPeriode;
use App\Models\Murid;
use Livewire\Component;
use DB;

class AnggotaKelas extends Component
{
    public $kelas_id,$dmurid_id,$search,$anggota,$di;
    public $murid_id = [];
    public $isOpen;


    public function mount($id,$di){

        $this->kelas_id = $id;
        $this->di = $di;
    }

    public function render()
    {
        $searchParams = '%'.$this->search.'%';

        $dkelas = KelasPeriode::find($this->kelas_id);
        $dkelas1 = KelasPeriode::select('id')->where('periode_id',$dkelas->periode_id);
        $dmurid = DetailMurid::select('murid_id')->whereIn('kelas_id',$dkelas1);
        $this->anggota = Murid::whereNotIn('id',$dmurid)->pluck('name','id');

        $kelas = Kelas::pluck('name','id');
        $dkelas = KelasPeriode::pluck('kelas_id','id');
        $murids = DB::table('detail_murids')->join('murids','murids.id','detail_murids.murid_id')->select('detail_murids.*','murids.name as nama')->where('kelas_id',$this->kelas_id)->where('murids.name','like',$searchParams)->paginate(7);

        if($this->di==2){
            return view('livewire.detailkelas.anggota' ,[
                'murids' => $murids,
                'anggota' => $this->anggota,
                'kelas' => $kelas,
                'dkelas' =>$dkelas
            ]);
        }else{
            return view('livewire.uangasrama.anggota' ,[
                'murids' => $murids,
                'anggota' => $this->anggota,
                'askes' => $kelas,
                'daskes' =>$dkelas
            ]);
        }
    }

    public function store(){
        $this->validate(
            [
                'murid_id' => 'required',
            ]
        );

        $cek_kelas = KelasPeriode::find($this->kelas_id);
        $cek_asrama = AsramaPeriode::where('periode_id',$cek_kelas->periode_id)->get();
        $status = 0;
        foreach($this->murid_id as $murid){
            // dd($murid);
            foreach($cek_asrama as $id_asrama){

                $cek_murid = DetailMurid::where('murid_id',$murid)
                ->where('asrama_id',$id_asrama->id)
                ->get();
                if(count($cek_murid)!= 0){
                    // dd('234');
                    $status = 1;
                    foreach($cek_murid as $cek){
                        DetailMurid::where('id',$cek->id)
                        ->update([
                            'kelas_id' => $this->kelas_id
                        ]);
                    }
                    // $status = 1;
                }else{
                    $status = 2;
                }
            }

            if($status==2 || $status==0){
                DetailMurid::create([
                    'kelas_id' => $this->kelas_id,
                    'murid_id' => $murid
                ]);
            }

        }
        session()->flash('info', $this->dmurid_id ? 'Anggota Kelas Update Successfully' : 'Anggota Kelas Created Successfully' );

        $this->dmurid_id = '';
        $this->anggota = '';

        return redirect()->route('akelas', [$this->kelas_id,$this->di]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->isOpen = false;
    }

    public function delete($id){

        $dmurid = DetailMurid::find($id);
        $dmurid->update([
            'kelas_id' => null
        ]);
        session()->flash('delete','Anggota Kelas Successfully Deleted');
    }

}
