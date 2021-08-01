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
        <b>NERACA UANG ASRAMA {{$months[$month]}} {{$periode->year}}</b>
    </div>
    <table class="item">
        <thead class="border">
            <tr >
                <th class="border jarakhead">Tanggal</th>
                <th class="border jarakhead">Debit</th>
                <th class="border jarakhead">Kredit</th>
                <th class="border jarakhead">Saldo di Akhir Bulan {{$months[$month]}}</th>
            </tr>
        </thead>
        <tbody class="border">
            <tr>
                <td class="border center jarakbody">{{$month-1}}-{{$periode->year}}</td>
                <td class="border center jarakbody">
                        Rp{{number_format($debitm)}},-
                </td>
                <td class="border center jarakbody">
                </td>
                <td class="border center jarakbody">
                </td>
            </tr>
            @foreach($tgl as  $key=>$t)
                <tr>
                    <td class="border center jarakbody">{{ date('d-m-Y', strtotime($t->tgl)) }}</td>
                    <td class="border center jarakbody">
                        @foreach ($debitd as $d)
                            @if($t->tgl==$d->tgl)
                                Rp{{number_format($d->debit)}},-
                            @endif
                        @endforeach
                    </td>
                    <td class="border center jarakbody">
                        @foreach ($kreditd as $k)
                            @if($t->tgl==$k->tgl)
                                Rp{{number_format($k->kredit)}},-
                            @endif
                        @endforeach
                    </td>
                    <td class="border center jarakbody"></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class="border">
            <tr>
                <th class="border center jarakbody">
                    Jumlah
                </th>
                <th class="border center jarakbody">
                    Rp{{number_format($debit+$debitm)}},-
                </th>
                <th class="border center jarakbody">
                    Rp{{number_format($kredit)}},-
                </th>
                <th class="border center jarakbody">
                    Rp{{number_format($debit+$debitm-$kredit)}},-
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
