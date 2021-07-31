<?php

namespace App\Http\Livewire;

use App\Models\AsramaPeriode;
use App\Models\DetailMurid;
use App\Models\Asrama;
use App\Models\KelasPeriode;
use App\Models\Murid;
use Livewire\Component;
use Illuminate\Support\Facades\DB ;

class AnggotaAsrama extends Component
{
    public $asrama_id,$dmurid_id,$search,$anggota,$di;
    public $murid_id = [];


    public function mount($id,$di){

        $this->asrama_id = $id;
        $this->di = $di;
    }

    public function render()
    {
        $searchParams = '%'.$this->search.'%';

        $dasrama = AsramaPeriode::find($this->asrama_id);
        $dasrama1 = AsramaPeriode::select('id')->where('periode_id',$dasrama->periode_id);
        $dmurid = DetailMurid::select('murid_id')->whereIn('asrama_id',$dasrama1);
        $this->anggota = Murid::whereNotIn('id',$dmurid)->pluck('name','id');

        $asrama = Asrama::pluck('name','id');
        $dasrama = AsramaPeriode::pluck('asrama_id','id');
        $murids = DB::table('detail_murids')->join('murids','murids.id','detail_murids.murid_id')->select('detail_murids.*','murids.name as nama', 'murids.nis as nis')->where('asrama_id',$this->asrama_id)->where('murids.name','like',$searchParams)->orderBy('murids.name')->get();

        if($this->di==2){
            return view('livewire.detailasrama.anggota' ,[
                'murids' => $murids,
                'anggota' => $this->anggota,
                'asrama' => $asrama,
                'dasrama' =>$dasrama
            ]);
        }else{
            return view('livewire.uangasrama.anggota' ,[
                'murids' => $murids,
                'anggota' => $this->anggota,
                'askes' => $asrama,
                'daskes' =>$dasrama
            ]);
        }
    }

    public function store(){
        $this->validate(
            [
                'murid_id' => 'required',
            ]
        );

        $cek_asrama = AsramaPeriode::find($this->asrama_id);
        $cek_kelas = KelasPeriode::where('periode_id',$cek_asrama->periode_id)->get();

        foreach($this->murid_id as $murid){

            foreach($cek_kelas as $id_kelas){

                $cek_murid = DetailMurid::where('murid_id',$murid)
                ->where('kelas_id',$id_kelas->id)
                ->get();
                if(count($cek_murid)!= 0){
                    // dd('234');
                    $status = 1;
                    foreach($cek_murid as $cek){
                        DetailMurid::where('id',$cek->id)
                        ->update([
                            'asrama_id' => $this->asrama_id
                        ]);
                    }
                }else{
                    $status = 2;
                }
            }

            if($status==2){
                DetailMurid::firstOrCreate([
                    'asrama_id' => $this->asrama_id,
                    'murid_id' => $murid
                ]);
            }

        }
        session()->flash('info', $this->dmurid_id ? 'Anggota Asrama Update Successfully' : 'Anggota Asrama Created Successfully' );

        $this->dmurid_id = '';
        $this->anggota = '';

        return redirect()->route('aasrama', [$this->asrama_id]);
    }

    public function delete($id){

        $dmurid = DetailMurid::find($id);
        $dmurid->update([
            'asrama_id' => null
        ]);
        session()->flash('delete','Berhasil Dihapus');
    }
}
