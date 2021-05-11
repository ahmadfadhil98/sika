<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title></title>
  </head>
  <body>

    <table class="table-fixed w-full text-center">
        <thead class="bg-blue-900">
            <tr>
                <th class="text-base font-normal px-4 py-2 text-white w-20">No</th>
                <th class="text-base font-normal px-4 py-2 text-white w-auto">Tanggal</th>
                <th class="text-base font-normal px-4 py-2 text-white w-auto">Debit</th>
                <th class="text-base font-normal px-4 py-2 text-white w-auto">Kredit</th>
                <th class="text-base font-normal px-4 py-2 text-white w-80">Saldo di Akhir Bulan
                    @if($month)
                        {{$months[$month]}}
                    @endif
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($tgl as  $key=>$t)
            <tr>
                <td class="px-2 py-3">{{ $tgl->firstitem() + $key }}</td>

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
