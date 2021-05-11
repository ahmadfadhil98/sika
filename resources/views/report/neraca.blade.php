<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <table>
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Saldo di Akhir Bulan
                    @if($month)
                        {{$months[$month]}}
                    @endif
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($tgl as  $key=>$t)
            <tr>
                <td>{{ $tgl->firstitem() + $key }}</td>

                <td>{{ $t->tgl }}</td>
                <td>
                    @if($t->debit!=null)
                        {{$t->debit}}
                    @endif
                </td>
                <td>
                    @if($t->kredit!=null)
                        {{$t->kredit}}
                    @endif
                </td>
                <td>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </body>
</html>
