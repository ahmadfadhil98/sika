<?php

namespace App\Exports;

use App\Models\Periode;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class NeracaExport implements FromView
{
    protected $period,$month;
    function __construct($period,$month) {
        $this->period = $period;
        $this->month = $month;
    }

    public function view(): View
    {
        $periode = Periode::find($this->period);
        $tgl = DB::table('pengeluarans')->whereYear('tgl',$periode->year)->whereMonth('tgl',$this->month)->select('tgl',DB::raw('SUM(harga) as kredit'),DB::raw("(select SUM(jumlah) from angsurans where angsurans.tgl=pengeluarans.tgl) as debit"))->groupBy('tgl')->paginate(7);
        return view('report.neraca', [
            'tgl' => $tgl
        ]);
    }
}
