<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 mt-12">

                <div class="text-base text-white text-blue-50">
                    Neraca Keuangan Asrama
                </div>

                {{-- @if($isOpen)
                         @include('livewire.detailkelas.form')
                @endif --}}

                <div class="mt-3 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">

                    <div class="text-xs text-blue-900 px-1 mt-1">
                        *Untuk melihat Neraca Keuangan Asrama, Klik <b>"Pilih neraca semester"</b> dan <b>"Pilih bulan"</b>
                    </div>

                    <div class="flex mb-4">
                        <div class="w-full md:w-1/2 text-left mt-4">
                            {{ Form::select('period',$periode,null,
                            ['class' => 'bg-gray-500 text-white py-2 px-6','id' => 'period','wire:change'=>'month()','wire:model'=>'period','placeholder'=>'- Pilih neraca semester -'])}}

                            {{ Form::select('month',$months,null,
                            ['class' => 'bg-gray-500 text-white py-2 px-6','id' => 'month','wire:model'=>'month','placeholder'=>'- Pilih bulan -'])}}
                        </div>

                        <div class="w-full md:w-1/2 text-right mt-4 ">
                            <button onclick="location.href='{{ route('report',[$this->period,$this->month,1]) }}'" class="bg-green-500 text-white py-2 px-6">
                                Laporan
                            </button>
                        </div>
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

                                <td>{{ date('d-m-Y', strtotime($t->tgl)) }}</td>
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

