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
        </style>
    <title></title>
  </head>
  <body>
    <div class="head">
        Pembayaran UANG MAKAN {{$months[$month]}} {{$periode->year}}
    </div>
    <table class="item" id="myTable">
        <thead class="border">
            <tr>
                <th class="border">Tanggal</th>
                <th class="border">Nama</th>
                <th class="border">Kelas</th>
                <th class="border">Jumlah
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
                        <td class="border" rowspan="{{ $a->span}}">{{date('d-m-Y', strtotime($t->tgl)) }}</td>
                        @endif
                    @endforeach
                @endif
                <td class="border"> {{ $murid[$dmurid[$uas_dmurid[$t->uas_id]]] }} </td>
                <td class="border"> {{ $kelas[$dkelas[$dmuridkelas[$uas_dmurid[$t->uas_id]]]] }} </td>
                <td class="border">Rp {{number_format($t->jumlah)}},-</td>
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
