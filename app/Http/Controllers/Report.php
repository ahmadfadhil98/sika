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
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Report extends Controller
{
    public $tgl;

    public function neraca($period,$month){

        $periode = Periode::find($period);
        $months = config('central.month');


        $this->tgl = DB::table('pengeluarans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->select('tgl',DB::raw('SUM(harga) as kredit'),DB::raw("(select SUM(jumlah) from angsurans where angsurans.tgl=pengeluarans.tgl) as debit"))->groupBy('tgl')->paginate(7);
        $pdf = PDF::loadview('report.neraca',[
            'tgl'=>$this->tgl,
            'month' => $month,
            'months' => $months
        ]);
        return $pdf->download('Neraca Uang Makan '.$months[$month].' '.$periode->year.'.pdf');
    }

    public function report_masuk($period,$month){

        $periode = Periode::find($period);
        $months = config('central.month');


        $this->tgl = DB::table('pengeluarans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->select('tgl',DB::raw('SUM(harga) as kredit'),DB::raw("(select SUM(jumlah) from angsurans where angsurans.tgl=pengeluarans.tgl) as debit"))->groupBy('tgl')->paginate(7);
        $pdf = PDF::loadview('report.neraca',[
            'tgl'=>$this->tgl,
            'month' => $month,
            'months' => $months
        ]);
        return $pdf->download('Neraca Uang Makan '.$months[$month].' '.$periode->year.'.pdf');
    }

    public function report_keluar($period,$month){

        $periode = Periode::find($period);
        $months = config('central.month');


        $this->tgl = DB::table('pengeluarans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$month)->select('tgl',DB::raw('SUM(harga) as kredit'),DB::raw("(select SUM(jumlah) from angsurans where angsurans.tgl=pengeluarans.tgl) as debit"))->groupBy('tgl')->paginate(7);
        $pdf = PDF::loadview('report.neraca',[
            'tgl'=>$this->tgl,
            'month' => $month,
            'months' => $months
        ]);
        return $pdf->download('Neraca Uang Makan '.$months[$month].' '.$periode->year.'.pdf');
    }
}
