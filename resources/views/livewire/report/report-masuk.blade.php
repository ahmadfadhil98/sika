<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-10">

        <div class="w-full mt-3 px-10 flex">
            <div class="w-1/2 flex">
                <a href="{{route('dashboard')}}" class="hover:underline text-gray-500 text-xs focus:outline-none mr-1.5">
                    Home
                </a>
                <div class="text-gray-300 mr-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
                </div>
                <button onClick="window.location.reload();" class="focus:outline-none hover:underline text-indigo-500 font-semibold text-xs">
                    Laporan Uang Masuk
                </button>
            </div>
            <div class="w-1/2 grid justify-end">
                <div class="flex text-gray-600 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" class="text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <a href="{{route('report_masuk')}}" class="mr-3 hover:underline text-gray-600 text-xs focus:outline-none ml-1.5">
                        Laporan Uang Masuk
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" class="text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <a href="{{route('report_keluar')}}" class="mr-3 hover:underline text-gray-600 text-xs focus:outline-none ml-1.5">
                        Laporan Uang Keluar
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" class="text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    <a href="{{route('tagihan')}}" class="hover:underline focus:outline-none text-xs ml-1.5 mr-1">
                        Lihat Tagihan Per Kelas
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign text-gray-600"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                </div>
            </div>
        </div>
    </div>

            {{-- Untuk Body --}}
    <div class="max-w-full mx-auto lg:px-2">
        <div class="shadow-xl rounded-t-lg px-3 py-5">

            <div class="mb-4">
                <div class="w-full text-center">
                    <div class="text-xl font-extrabold text-blue-900">
                        Laporan Uang Masuk
                    </div>
                </div>
                <div class="text-xs text-center text-gray-600 mt-1">
                    Untuk menampilkan Laporan Uang Masuk, pilih Semester dan Kelas
                </div>
                <div class="text-center mt-4">
                    {{ Form::select('period',$periode,null,
                    ['class' => 'transform hover:scale-95 duration-300 text-sm font-semibold text-gray-600 py-1.5 pl-2 pr-1 bg-indigo-50 border border-indigo-300 hover:bg-indigo-100 rounded-md shadow-inner focus:outline-none','id' => 'period','wire:change'=>'month()','wire:model'=>'period','placeholder'=>'- Pilih semester -'])}}
                    {{ Form::select('month',$months,null,
                    ['class' => 'transform hover:scale-95 duration-300 text-sm font-semibold text-gray-600 py-1.5 pl-2 pr-10 bg-indigo-50 border border-indigo-300 hover:bg-indigo-100 rounded-md shadow-inner focus:outline-none','id' => 'month','wire:model'=>'month','placeholder'=>'- Pilih bulan -'])}}
                </div>
                        @if(session()->has('info'))
                    <div class="bg-green-500 mb-4 py-2 px-6">
                        <div>
                            <h1 class="text-white text-sm">{{ session('info') }}</h1>
                        </div>
                    </div>
                        @endif
                @if ($this->period!=0&&$this->month!=0)

                    <div class="flex w-full">
                        <div class="w-full text-left">
                            @if ($debit)
                            <button wire:click="showReport()" class="transform hover:scale-95 duration-300 text-sm bg-white border border-gray-200 hover:bg-gray-50 rounded-full text-gray-600 py-2 px-7 focus:outline-none shadow-lg">
                                Masukkan ke Neraca
                            </button>
                            @endif
                        </div>
                        <div class="w-full grid justify-end">
                            <button onclick="location.href='{{ route('report',[$this->period,$this->month,3]) }}'" class="transform hover:scale-95 duration-300 text-sm bg-green-500 border border-green-500 hover:bg-green-600 rounded-full text-white py-2 px-7 focus:outline-none shadow-lg flex-shrink-0 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download -pt-0.5 mr-1.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                Download Laporan
                            </button>
                        </div>
                    </div>
                        @endif
            </div>

                    @if($isReport)
                         @include('livewire.report.confirmation_report')
                    @endif

                    @if($tgl!=[])
                    <table class="table-fixed w-full text-center" id="myTable">
                        <thead style="background-color: #262466;">
                            <tr>
                                <th class="text-sm font-normal pl-40 py-2.5 text-white w-1/2">Tanggal Pemasukan</th>
                                <th class="text-sm font-normal px-4 py-2.5 text-white w-1/3">Nama Peserta Didik</th>
                                <th class="text-sm font-normal px-4 py-2.5 text-white w-1/4">Kelas</th>
                                <th class="text-sm font-normal rounded-tr-full pr-40 py-2.5 text-white w-1/2">Uang Masuk
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $date = 0;
                            @endphp
                            @foreach($tgl as  $key=>$t)
                            <tr class="border border-gray-100">
                                @if ($date != $t->tgl)
                                    @foreach ($angsuran as $a)
                                        @if ($a->tgl == $t->tgl)
                                        <td class="text-sm text-gray-700 border border-gray-100 pl-40 py-2.5" rowspan="{{ $a->span}}">{{date('d-m-Y', strtotime($t->tgl)) }}</td>
                                        @endif
                                    @endforeach
                                @endif
                                <td class="text-sm text-gray-700 border border-gray-100 px-2 py-2.5"> {{ $murid[$dmurid[$uas_dmurid[$t->uas_id]]] }} </td>
                                <td class="text-sm text-gray-700 border border-gray-100 px-2 py-2.5"> {{ $kelas[$dkelas[$dmuridkelas[$uas_dmurid[$t->uas_id]]]] }} </td>
                                <td class="text-sm text-gray-700 font-semibold border border-gray-100 pr-40 py-2.5">Rp {{number_format($t->jumlah)}},-</td>
                            </tr>
                            @php
                                $date = $t->tgl;
                            @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan=3 class="bg-indigo-50 text-sm text-gray-700 font-bold text-right pr-10 py-2.5">
                                    Jumlah Uang Masuk
                                </th>
                                <th class="hover:underline bg-indigo-50 text-sm text-gray-700 pr-40 font-bold">
                                    Rp {{number_format($debit)}},-
                                </th>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="mt-4">
                          {{-- {{$tgl->links()}} --}}
                    </div>
                    @endif
        </div>

    </div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <script>
    //   $(document).ready(function() {
    //     //   $('#kelas_id').select2();

    //       $('#periode_id').change(function(e) {
    //         val = $(this).val();
    //         console.log(val);
    //       });
    //   });
    //   $(document).ready(function() {
    //    var span = 1;
    //    var prevTD = "";
    //    var prevTDVal = "";
    //    $("#myTable tr td:first-child").each(function() { //for each first td in every tr
    //       var $this = $(this);
    //       console.log(1);
    //       if ($this.text() == prevTDVal) { // check value of previous td text
    //          span++;
    //          if (prevTD != "") {
    //             prevTD.attr("rowspan", span); // add attribute to previous td
    //             $this.remove(); // remove current td
    //          }
    //       } else {
    //          prevTD     = $this; // store current td
    //          prevTDVal  = $this.text();
    //          span       = 1;
    //       }
    //    });
    // });
  </script>

