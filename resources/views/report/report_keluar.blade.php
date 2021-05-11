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
        </style>
    <title></title>
  </head>
  <body>
    <div class="head">
        Buku pembantu pengeluaran dapur bulan {{$months[$month]}} {{$periode->year}}
    </div>
    <table class="item" id="myTable">
        <thead class="border">
            <tr>
                <th class="border">Tanggal</th>
                <th class="border">Nama Barang</th>
                <th class="border">Lauk/Sayur</th>
                @foreach ($barangs as $b)
                    <th class="border">{{$b->name}}</th>
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
                <th class="border">Jumlah</th>
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
                        <td rowspan="{{ $a->span}}" class="border">{{date('d', strtotime($t->tgl)) }}</td>
                        @endif
                    @endforeach
                @endif
                <td class="border"> {{ $barang[$t->barang_id]}} {{$t->jumlah}} {{ $satuan[$t->barang_id]}} </td>
                <td class="border">
                    @if ( $jenis[$peng[$t->id]] == 2 )
                        {{number_format($t->harga)}}
                    @endif
                </td>
                @foreach ($barangs as $b)
                    <td class="border">
                        @if ( $barang[$peng[$t->id]] == $b->name )
                            {{number_format($t->harga)}}
                        @endif
                    </td>
                @endforeach
                <td class="border">{{number_format($t->harga)}}</td>
            </tr>
            @php
                $date = $t->tgl;
            @endphp
            @endforeach
        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <td class="ttd">
                Mengetahui, <br>
                Kepala Sekolah SMAN 2 Harau <br>
                <br>
                <br>
                <br>
                LELI HANAFIAH, S.Pd, M.Si <br>
                NIP.19611110 198512 2 002 <br>
                </td>
                <td>
                Tarantang, &emsp; {{$months[$month]}} {{$periode->year}} <br>
                Bendahara  uang makan <br>
                <br>
                <br>
                <br>
                ROSIDAH,S.Pd <br>
                NIP.19641231 199003 2 031 <br>
                </td>
            </tr>
        </tbody>
    </table>
  </body>
</html>
