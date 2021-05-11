<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">

                <div class="mt-9 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">

                    <div class="w-full text-center mb-4">
                        <div class="text-xl font-bold text-blue-900">
                            Laporan Neraca
                        </div>
                        <div class="text-sm text-blue-900 mt-2">
                            Untuk menampilkan <b>Laporan Neraca</b>, Klik "Pilih neraca semester" dan "Pilih bulan"
                        </div>
                        <div class="text-center mt-2 text-sm">
                            {{ Form::select('period',$periode,null,
                            ['class' => 'border border-gray-100 hover:bg-gray-100 text-gray-700 py-2 px-6 mt-4 focus:outline-none','id' => 'period','wire:change'=>'month()','wire:model'=>'period','placeholder'=>'- Pilih neraca semester -'])}}

                            {{ Form::select('month',$months,null,
                            ['class' => 'border border-gray-100 hover:bg-gray-100 text-gray-700 py-2 px-6 mt-4 focus:outline-none','id' => 'month','wire:model'=>'month','placeholder'=>'- Pilih bulan -'])}}
                        </div>

                        @if ($this->period!=0&&$this->month!=0)
                            <div class="w-full text-right">
                               <button onclick="location.href='{{ route('report',[$this->period,$this->month,1]) }}'" class="bg-green-500 hover:bg-green-800 text-white py-2 px-6">
                                  Download Laporan
                               </button>
                            </div>
                        @endif
                    </div>


                    @if(session()->has('info'))
                        <div class="bg-green-500 mb-4 py-2 px-6">
                            <div>
                                <h1 class="text-white text-sm">{{ session('info') }}</h1>
                            </div>
                        </div>

                    @endif

                      @if(session()->has('delete'))
                        <div class="bg-red-700 mb-4 py-2 px-6">
                            <div>
                                <h1 class="text-white text-sm">{{ session('delete') }}</h1>
                            </div>
                        </div>
                    @endif

                    <table class="table-fixed w-full text-center">
                        <thead class="border border-blue-900 bg-blue-900">
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
                            <tr class="border border-gray-100">
                                <td class="text-sm px-2 py-3">{{ $tgl->firstitem() + $key }}.</td>

                                <td class="text-sm">{{ date('d-m-Y', strtotime($t->tgl)) }}</td>
                                <td class="text-sm">
                                    @if($t->debit!=null)
                                        Rp{{number_format($t->debit)}},-
                                    @endif
                                </td>
                                <td class="text-sm">
                                    @if($t->kredit!=null)
                                        Rp{{number_format($t->kredit)}},-
                                    @endif
                                </td>
                                <td class="text-sm">

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                          {{$tgl->links()}}
                    </div>

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

