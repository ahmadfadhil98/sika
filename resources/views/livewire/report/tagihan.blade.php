<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">

                <div class="mt-9 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">

                    <div class="w-full text-center mb-4">
                        <div class="text-xl font-bold text-blue-900">
                            Laporan Tagihan
                        </div>
                        <div class="text-sm text-blue-900 mt-2">
                            Untuk menampilkan <b>Tagihan</b>, Klik "Pilih neraca semester" dan "Pilih kelas"
                        </div>
                        <div class="text-center mt-2 text-sm">
                            {{ Form::select('period',$periode,null,
                            ['class' => 'border border-gray-100 hover:bg-gray-100 text-gray-700 py-2 px-6 mt-4 focus:outline-none','id' => 'period','wire:change'=>'kelas()','wire:model'=>'period','placeholder'=>'- Pilih neraca semester -'])}}

                            {{ Form::select('kelass',$kelas,null,
                            ['class' => 'border border-gray-100 hover:bg-gray-100 text-gray-700 py-2 px-6 mt-4 focus:outline-none','id' => 'kelass','wire:model'=>'kelass','placeholder'=>'- Pilih kelas -'])}}
                        </div>

                        @if ($this->period!=0&&$this->kelass!=0)
                            <div class="w-full text-right">
                               <button onclick="location.href='{{ route('report',[$this->period,$this->kelass,$this->dkelasId]) }}'" class="bg-green-500 hover:bg-green-800 text-white py-2 px-6">
                                  Download Laporan
                               </button>
                            </div>
                        @endif
                    </div>

                    @if ($murids!=[])
                    <table class="table-fixed w-full text-center">
                        <thead class="border border-blue-900 bg-blue-900">
                            <tr>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Nama Peserta Didik</th>
                                @foreach ($months as $m)
                                    <th class="text-base font-normal px-4 py-2 text-white w-auto">{{$month[$m]}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($murids as  $key=>$mur)
                                <tr class="border border-gray-100">

                                    <td class="text-sm py-3">{{ $murid[$mur->murid_id] }}</td>
                                            @foreach ($months as $m)
                                                @php
                                                    $ua = $uas->where('murid_id',$mur->id)->where('month',$m);
                                                @endphp
                                                <td class="text-sm">
                                                    @if ($ua=='[]')
                                                        Rp{{number_format($suas)}},-
                                                    @else
                                                        @foreach ($ua as $u)
                                                                Rp{{number_format($suas-$u->jumlah)}},-
                                                        @endforeach
                                                    @endif
                                                </td>
                                            @endforeach
                                </tr>
                                @endforeach
                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <td>
                                    Jumlah
                                </td>
                                <td>
                                    Rp{{number_format($debit+$debitm)}},-
                                </td>
                                <td>
                                    Rp{{number_format($kredit)}},-
                                </td>
                                <td>
                                    Rp{{number_format($debit+$debitm-$kredit)}},-
                                </td>
                            </tr>
                        </tfoot> --}}
                    </table>
                    <div class="mt-4">
                          {{-- {{$murids->links()}} --}}
                    </div>
                    @endif
                </div>

            </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <script>
      $(document).ready(function() {
        //   $('#kelas_id').select2();

          $('#periode_id').change(function(e) {
            val = $(this).val();
            console.log(val);
          });
      });
  </script>

