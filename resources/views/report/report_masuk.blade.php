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
            width: 70%;
        }

        .head{
            text-align: center;
            text-transform: uppercase;
        }

        .center{
            text-align: center;
        }

        .padding{
            padding-left: 15px;
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
        <b>PEMBAYARAN UANG ASRAMA BULAN {{$months[$month]}} {{$periode->year}}</b>
    </div>
    <table class="item" id="myTable">
        <thead class="border">
            <tr>
                <th class="border jarakhead">Tanggal</th>
                <th class="border jarakhead">Nama</th>
                <th class="border jarakhead">Kelas</th>
                <th class="border jarakhead">Jumlah
                </th>
            </tr>
        </thead>
        <tbody class="border">
            @php
                $date = 0;
            @endphp
            @foreach($tgl as  $key=>$t)
            <tr>
                @if ($date != $t->tgl)
                    @foreach ($angsuran as $a)
                        @if ($a->tgl == $t->tgl)
                        <td class="border center" rowspan="{{ $a->span}}">{{date('d-m-Y', strtotime($t->tgl)) }}</td>
                        @endif
                    @endforeach
                @endif
                <td class="border padding"> {{ $murid[$dmurid[$uas_dmurid[$t->uas_id]]] }} </td>
                <td class="border center jarakbody"> {{ $kelas[$dkelas[$dmuridkelas[$uas_dmurid[$t->uas_id]]]] }} </td>
                <td class="border center jarakbody">Rp {{number_format($t->jumlah)}},-</td>
            </tr>
            @php
                $date = $t->tgl;
            @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan=3 class="border center jarakbody">
                    Jumlah
                </th>
                <th class="border center jarakbody">
                    Rp{{number_format($debit)}},-
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
