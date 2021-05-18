<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style>

        table {
            width: 100%;
            border-collapse: collapse;
        }
        .border{
            border: 1px solid black;
        }

        table.item{
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .ttd{
            width: 80%;
        }

        .head{
            text-align: center;
            text-transform: uppercase;
        }

        .center{
            text-align: center;
        }

        .jarakhead{
            padding: 7px;
        }

        .jarakbody{
            padding: 3px;
        }

        </style>
    <title></title>
  </head>
  <body>
    <div class="head">
        <b>BUKU PEMBANTU PENGELUARAN DAPUR BULAN {{$months[$month]}} {{$periode->year}}</b>
    </div>
    <table class="item" id="myTable">
        <thead class="border">
            <tr>
                <th class="border jarakhead">Tanggal</th>
                <th class="border jarakhead">Nama Barang</th>
                <th class="border jarakhead">Lauk/Sayur</th>
                @foreach ($barangs as $b)
                    <th class="border jarakhead">{{$b->name}}</th>
                @endforeach
                {{-- <th class="w-auto">Air</th>
                <th class="w-auto">Gas</th>
                <th class="w-auto">Beras</th>
                <th class="w-auto">Telur</th>
                <th class="w-auto">MG</th>
                <th class="w-auto">Pulsa</th>
                <th class="w-auto">Alat Dapur</th>
                <th class="w-auto">Token</th>
                <th class="w-auto">Kecap</th>
                <th class="w-auto">Gaji TK Masak</th>
                <th class="w-auto">Pabukoan</th> --}}
                <th class="border jarakhead">Jumlah</th>
            </tr>
        </thead>
        <tbody class="border">
            @php
                $date = 0;
            @endphp
            @foreach($tgl as  $key=>$t)
            <tr>
                @if ($date != $t->tgl)
                    @foreach ($pengeluaran as $a)
                        @if ($a->tgl == $t->tgl)
                        <td rowspan="{{ $a->span}}" class="border center jarakbody">{{date('d-m-Y', strtotime($t->tgl)) }}</td>
                        @endif
                    @endforeach
                @endif
                <td class="border center jarakbody"> {{ $barang[$t->barang_id]}} {{$t->jumlah}} {{ $satuan[$t->barang_id]}} </td>
                <td class="border center jarakbody">
                    @if ( $jenis[$peng[$t->id]] == 2 )
                        Rp{{number_format($t->harga)}},-
                    @endif
                </td>
                @foreach ($barangs as $b)
                    <td class="border center jarakbody">
                        @if ( $barang[$peng[$t->id]] == $b->name )
                            Rp{{number_format($t->harga)}},-
                        @endif
                    </td>
                @endforeach
                <td class="border center jarakbody">
                    Rp{{number_format($t->harga)}},-
                </td>
            </tr>
            @php
                $date = $t->tgl;
            @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan=2 class="border center jarakbody">
                    Jumlah
                </th>
                @foreach ($kredit1 as $k1)
                    <th class="border center jarakbody">
                        @if ($k1->kredit)
                            Rp{{number_format($k1->kredit)}},-
                        @endif
                    </th>
                @endforeach
                @foreach ($barangs as $b)
                    <th class="border center jarakbody">
                        @foreach ($kredit2 as $k2)
                            @if ( $k2->barang_id == $b->id )
                                Rp{{number_format($k2->kredit)}},-
                            @endif
                        @endforeach
                    </th>
                @endforeach
                <th class="border center jarakbody">
                    Rp{{number_format($kredit)}},-
                </th>
            </tr>
        </tfoot>
    </table>

    <table>
        <tbody>
            <tr>
                <td class="ttd">
                Mengetahui, <br>
                Kepala SMAN 2 Harau <br>
                <br>
                <br>
                <br>
                <b>Lely Hanafiah, S.Pd, M.Si</b><br>
                NIP 19611110 198512 2 002 <br>
                </td>
                <td>
                Tarantang, &emsp; {{$months[$month]}} {{$periode->year}} <br>
                Bendahara Uang Asrama <br>
                <br>
                <br>
                <br>
                <b>Rosidah, S.Pd</b><br>
                NIP 19641231 199003 2 031 <br>
                </td>
            </tr>
        </tbody>
    </table>
  </body>
</html>
