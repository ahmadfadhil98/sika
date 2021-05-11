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
        NERACA UANG MAKAN {{$months[$month]}} {{$periode->year}}
    </div>
    <table class="item">
        <thead class="border">
            <tr >
                <th class="border">Tanggal</th>
                <th class="border">Debit</th>
                <th class="border">Kredit</th>
                <th class="border">Saldo di Akhir Bulan {{$months[$month]}}</th>
            </tr>
        </thead>
        <tbody class="border">
            @foreach($tgl as  $key=>$t)
            <tr>
                <td class="border">{{ $t->tgl }}</td>
                <td class="border">
                    @if($t->debit!=null)
                        {{number_format($t->debit)}}
                    @endif
                </td>
                <td class="border">
                    @if($t->kredit!=null)
                        {{number_format($t->kredit)}}
                    @endif
                </td>
                <td class="border">
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class="border">
            <tr>
                <td class="border">Jumlah</td>
                <td class="border">{{number_format($debit)}}</td>
                <td class="border">{{number_format($kredit)}}</td>
                <td class="border">{{number_format($debit-$kredit)}}</td>
            </tr>
        </tfoot>
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
