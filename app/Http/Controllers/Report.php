<?php

namespace App\Http\Controllers;

use App\Exports\NeracaExport;
use App\Models\Angsuran;
use App\Models\Barang;
use App\Models\DetailMurid;
use App\Models\Kelas;
use App\Models\KelasPeriode;
use App\Models\Murid;
use App\Models\Pengeluaran;
use App\Models\Periode;
use App\Models\UangAsrama;
use App\Models\UasPeriode;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Report extends Controller
{
    public $tgl;

    public function report($period,$month,$jenism){
            $periode = Periode::find($period);
            $months = config('central.month');

        if($jenism==1){

            $this->tgl = DB::table('pengeluarans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->select('tgl',DB::raw('SUM(harga) as kredit'),DB::raw("(select SUM(jumlah) from angsurans where angsurans.tgl=pengeluarans.tgl) as debit"))->groupBy('tgl')->get();

            $debt = DB::table('angsurans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->select(DB::raw('SUM(jumlah) as debit'))->get();
            foreach ($debt as $d){
                $debit = $d->debit;
            }
            $kre = DB::table('pengeluarans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->select(DB::raw('SUM(harga) as kredit'))->get();
            foreach ($kre as $k){
                $kredit = $k->kredit;
            }

            $pdf = PDF::loadview('report.neraca',[
                'tgl'=>$this->tgl,
                'month' => $month,
                'debit' => $debit,
                'kredit' => $kredit,
                'months' => $months,
                'periode' => $periode
            ]);
            return $pdf->download('Neraca Uang Makan '.$months[$month].' '.$periode->year.'.pdf');

        }elseif($jenism==2){

            $pengeluaran = DB::table('pengeluarans')->select('tgl',DB::raw('COUNT(id) as span'))->groupBy('tgl')->get();
            $barang = Barang::pluck('name','id');
            $satuan = Barang::pluck('satuan','id');
            $peng =  Pengeluaran::pluck('barang_id','id');
            $jenis = Barang::pluck('jenis','id');
            $barangs = Barang::where('jenis','!=',2)->get();
            $this->tgl = DB::table('pengeluarans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->get();
            $pdf = PDF::loadview('report.report_keluar',[
                'tgl' => $this->tgl,
                'barang' => $barang,
                'barangs' => $barangs,
                'satuan' => $satuan,
                'peng' => $peng,
                'jenis' => $jenis,
                'pengeluaran' => $pengeluaran,
                'months' => $months,
                'month' => $month,
                'periode' => $periode
            ]);
            return $pdf->download('Laporan Pengeluaran Uang Asrama '.$months[$month].' '.$periode->year.'.pdf');

        }elseif($jenism==3){

            $murid = Murid::pluck('name','id');
            $kelas = Kelas::pluck('name','id');
            $uas_id = Angsuran::pluck('uas_id','id');
            $uas_dmurid = UangAsrama::pluck('murid_id','id');
            $dmurid = DetailMurid::pluck('murid_id','id');
            $dmuridkelas = DetailMurid::pluck('kelas_id','id');
            $dkelas = KelasPeriode::pluck('kelas_id','id');

            $angsuran = DB::table('angsurans')->select('tgl',DB::raw('COUNT(id) as span'))->groupBy('tgl')->get();
            $this->tgl = DB::table('angsurans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->select('tgl','uas_id','jumlah')->orderBy('tgl')->get();
            $pdf = PDF::loadview('report.report_masuk',[
                'tgl' => $this->tgl,
                'murid' => $murid,
                'kelas' => $kelas,
                'uas_id' => $uas_id,
                'uas_dmurid' => $uas_dmurid,
                'dmurid' => $dmurid,
                'dmuridkelas' => $dmuridkelas,
                'dkelas' => $dkelas,
                'angsuran' => $angsuran,
                'months' => $months,
                'month' => $month,
                'periode' => $periode
            ]);
            return $pdf->download('Laporan Pembayaran Uang Asrama '.$months[$month].' '.$periode->year.'.pdf');

        }else{
            $periodes = Periode::select('id', DB::raw("CONCAT(if(period=1,concat(year-1,'/',year),concat(year,'/',year+1)),'-',if(period=1,'Semester 2','Semester 1')) AS semester"))->orderBy('id','desc')->pluck('semester','id');

            $dkelas = KelasPeriode::where('kelas_id',$month)->where('periode_id',$period)->get();
            $dkelasId = $jenism;

            if($periode->period==1){
                $months = [1,2,3,4,5,6];
                $month = config('central.month1');
            }else{
                $months = [7,8,9,10,11,12];
                $month = config('central.month2');
            }

            foreach ($dkelas as $dk){
               $murids = DetailMurid::where('kelas_id',$dk->id)->get();
            }

            $kelas = Kelas::pluck('name','id');
            $up = UasPeriode::where('periode_id',$period)->get();

            foreach ($up as $su){
                $suas = $su->jumlah;
            }

            $murid = Murid::pluck('name','id');
            $uas = UangAsrama::get();

            $pdf = PDF::loadview('report.tagihan',[
                'murids' => $murids,
                'kelas' => $kelas,
                'periodes' => $periodes,
                'period' => $period,
                'murid' => $murid,
                'uas' => $uas,
                'suas' => $suas,
                'months' => $months,
                'month' => $month
            ]);
            return $pdf->download('Laporan Tagihan '.$months[$dkelasId].' '.$periodes[$period].'.pdf');
        }

    }

    public function view($period,$month,$jenism){
        $periode = Periode::find($period);
        $months = config('central.month');

    if($jenism==1){

        $this->tgl = DB::table('pengeluarans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->select('tgl',DB::raw('SUM(harga) as kredit'),DB::raw("(select SUM(jumlah) from angsurans where angsurans.tgl=pengeluarans.tgl) as debit"))->groupBy('tgl')->get();

        $debt = DB::table('angsurans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->select(DB::raw('SUM(jumlah) as debit'))->get();
        foreach ($debt as $d){
            $debit = $d->debit;
        }
        $kre = DB::table('pengeluarans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->select(DB::raw('SUM(harga) as kredit'))->get();
        foreach ($kre as $k){
            $kredit = $k->kredit;
        }

        return view('report.neraca',[
            'tgl'=>$this->tgl,
            'month' => $month,
            'debit' => $debit,
            'kredit' => $kredit,
            'months' => $months,
            'periode' => $periode
        ]);

    }elseif($jenism==2){

        $pengeluaran = DB::table('pengeluarans')->select('tgl',DB::raw('COUNT(id) as span'))->groupBy('tgl')->get();
        $barang = Barang::pluck('name','id');
        $satuan = Barang::pluck('satuan','id');
        $peng =  Pengeluaran::pluck('barang_id','id');
        $jenis = Barang::pluck('jenis','id');
        $barangs = Barang::where('jenis','!=',2)->get();
        $this->tgl = DB::table('pengeluarans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->orderBy('tgl')->get();
        return view('report.report_keluar',[
            'tgl' => $this->tgl,
            'barang' => $barang,
            'barangs' => $barangs,
            'satuan' => $satuan,
            'peng' => $peng,
            'jenis' => $jenis,
            'pengeluaran' => $pengeluaran,
            'months' => $months,
            'month' => $month,
            'periode' => $periode
        ]);

    }elseif($jenism==3){

        $murid = Murid::pluck('name','id');
        $kelas = Kelas::pluck('name','id');
        $uas_id = Angsuran::pluck('uas_id','id');
        $uas_dmurid = UangAsrama::pluck('murid_id','id');
        $dmurid = DetailMurid::pluck('murid_id','id');
        $dmuridkelas = DetailMurid::pluck('kelas_id','id');
        $dkelas = KelasPeriode::pluck('kelas_id','id');

        $angsuran = DB::table('angsurans')->select('tgl',DB::raw('COUNT(id) as span'))->groupBy('tgl')->get();
        $this->tgl = DB::table('angsurans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->select('tgl','uas_id','jumlah')->orderBy('tgl')->get();
        return view('report.report_masuk',[
            'tgl' => $this->tgl,
            'murid' => $murid,
            'kelas' => $kelas,
            'uas_id' => $uas_id,
            'uas_dmurid' => $uas_dmurid,
            'dmurid' => $dmurid,
            'dmuridkelas' => $dmuridkelas,
            'dkelas' => $dkelas,
            'angsuran' => $angsuran,
            'months' => $months,
            'month' => $month,
            'periode' => $periode
        ]);
    }else{
        $periodes = Periode::select('id', DB::raw("CONCAT(if(period=1,concat(year-1,'/',year),concat(year,'/',year+1)),'-',if(period=1,'Semester 2','Semester 1')) AS semester"))->orderBy('id','desc')->pluck('semester','id');

        $dkelas = KelasPeriode::where('kelas_id',$month)->where('periode_id',$period)->get();
        $dkelasId = $jenism;

        if($periode->period==1){
            $months = [1,2,3,4,5,6];
            $month = config('central.month1');
        }else{
            $months = [7,8,9,10,11,12];
            $month = config('central.month2');
        }

        foreach ($dkelas as $dk){
           $murids = DetailMurid::where('kelas_id',$dk->id)->get();
        }

        $kelas = Kelas::pluck('name','id');
        $up = UasPeriode::where('periode_id',$period)->get();

        foreach ($up as $su){
            $suas = $su->jumlah;
        }

        $murid = Murid::pluck('name','id');
        $uas = UangAsrama::get();

        return view('report.tagihan',[
            'murids' => $murids,
            'kelas' => $kelas,
            'periodes' => $periodes,
            'periode' =>$periode,
            'period' => $period,
            'murid' => $murid,
            'uas' => $uas,
            'suas' => $suas,
            'months' => $months,
            'month' => $month
        ]);
    }

}
}
