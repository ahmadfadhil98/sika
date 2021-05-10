<?php

namespace App\Http\Controllers;

use App\Exports\NeracaExport;
use App\Models\Barang;
use App\Models\Pengeluaran;
use App\Models\Periode;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Report extends Controller
{
    public $tgl;
    public function report($period,$month,$jenise){

        $periode = Periode::find($period);
        $months = config('central.month');

        $murid = Murid::pluck('name','id');
        $kelas = Kelas::pluck('name','id');
        $uas_id = Angsuran::pluck('uas_id','id');
        $uas_dmurid = UangAsrama::pluck('murid_id','id');
        $dmurid = DetailMurid::pluck('murid_id','id');
        $dmuridkelas = DetailMurid::pluck('kelas_id','id');
        $dkelas = KelasPeriode::pluck('kelas_id','id');

        $barang = Barang::pluck('name','id');
        $satuan = Barang::pluck('satuan','id');
        $pengeluaran = Pengeluaran::select('tgl','id');
        $peng =  Pengeluaran::pluck('barang_id','id');
        $jenis = Barang::pluck('jenis','id');
        $barangs = Barang::where('jenis','!=',2)->get();

        if($jenise==1){
            $this->tgl = DB::table('pengeluarans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->select('tgl',DB::raw('SUM(harga) as kredit'),DB::raw("(select SUM(jumlah) from angsurans where angsurans.tgl=pengeluarans.tgl) as debit"))->groupBy('tgl')->paginate(7);
            $pdf = PDF::loadview('report.neraca',[
                'tgl'=>$this->tgl,
                'month' => $month,
                'months' => $months
            ]);
            return $pdf->download('Neraca Uang Makan '.$months[$month].' '.$periode->year.'.pdf');
        }elseif($jenise==3){
            $pdf = PDF::loadview('report.neraca',[
                'tgl'=>$this->tgl,
                'month' => $month,
                'months' => $months
            ]);
            return $pdf->download('Neraca Uang Makan '.$months[$month].' '.$periode->year.'.pdf');
        }elseif($jenise==2){
            $this->tgl = DB::table('pengeluarans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->paginate(7);
            $pdf = PDF::loadview('report.report_keluar',[
                'tgl'=>$this->tgl,
                'barang' => $barang,
                'barangs' => $barangs,
                'satuan' => $satuan,
                'peng' => $peng,
                'jenis' => $jenis,
                'pengeluaran' => $pengeluaran,
            ]);
            return $pdf->download('Neraca Uang Makan '.$months[$month].' '.$periode->year.'.pdf');
        }


    }

    public function baju($period,$month,$jenis){
        $periode = Periode::find($period);
        $tgl = DB::table('pengeluarans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->select('tgl',DB::raw('SUM(harga) as kredit'),DB::raw("(select SUM(jumlah) from angsurans where angsurans.tgl=pengeluarans.tgl) as debit"))->groupBy('tgl')->paginate(7);
        $months = config('central.month');
        $slot = [];
        return view('report.neraca',compact('months','month','tgl','slot'));
    }
}
