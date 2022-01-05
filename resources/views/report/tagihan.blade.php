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
        TAGIHAN UANG ASRAMA KELAS {{$kelas[$dkelasp[$dkelasId]]}} PADA {{$periodes[$period]}}
    </div>
    <table class="item">
        <thead class="border">
            <tr class="border center">
                <th class="border jarakhead">
                    Nama Peserta Didik
                </th>
                @foreach ($month as $m)
                    <th class="border">
                        {{$months[$m]}}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="border">
            @foreach($murids as  $key=>$mur)
                <tr class="border center">
                    <td class="border jarakbody">
                        {{ $murid[$mur->murid_id] }}
                    </td>
                    @foreach ($month as $m)
                        @php
                            $ua = $uas->where('murid_id',$mur->id)->where('month',$m);
                        @endphp
                        <td class="border jarakbody">
                            @if ($ua=='[]')
                                Rp {{number_format($suas)}}.-
                            @else
                                @foreach ($ua as $u)
                                    @if ($u->keterangan=='LUNAS')
                                        LUNAS
                                    @else
                                        Rp {{number_format($suas-$u->jumlah)}}.-
                                    @endif
                                @endforeach
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
        {{-- <tfoot class="border">
            <tr>
                <td class="border center jarakbody">Jumlah</td>
                <td class="border center jarakbody">{{number_format($debit)}}</td>
                <td class="border center jarakbody">{{number_format($kredit)}}</td>
                <td class="border center jarakbody">{{number_format($debit-$kredit)}}</td>
            </tr>
        </tfoot> --}}
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
                <b>Eli Marlina, S.Pd.</b><br>
                NIP 19750624 200012 2 001 <br>
                </td>
                <td>
                Tarantang, &emsp; {{$months[$bulan]}} {{$periode->year}} <br>
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
