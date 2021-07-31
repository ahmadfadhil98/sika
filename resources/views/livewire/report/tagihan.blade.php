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
                    Laporan Tagihan
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
                                Laporan Tagihan
                            </div>
                        </div>
                        <div class="text-xs text-center text-gray-600 mt-1">
                            Untuk menampilkan Laporan Tagihan, pilih Semester dan Kelas
                        </div>
                        <div class="text-center mt-4">
                            {{ Form::select('period',$periode,null,
                            ['class' => 'transform hover:scale-95 duration-300 text-sm font-semibold text-gray-600 py-1.5 pl-2 pr-1 bg-yellow-50 border border-yellow-300 hover:bg-yellow-100 rounded-md shadow-inner focus:outline-none','id' => 'period','wire:change'=>'kelas()','wire:model'=>'period','placeholder'=>'- Pilih semester -'])}}
                            {{ Form::select('kelass',$kelas,null,
                            ['class' => 'transform hover:scale-95 duration-300 text-sm font-semibold text-gray-600 py-1.5 pl-2 pr-10 bg-yellow-50 border border-yellow-300 hover:bg-yellow-100 rounded-md shadow-inner focus:outline-none','id' => 'kelass','wire:model'=>'kelass','placeholder'=>'- Pilih kelas -'])}}
                        </div>

                        @if ($this->period!=0&&$this->kelass!=0)
                            <div class="flex w-full">
                                <div class="flex-shrink-0 flex items-center w-1/2">
                                    <div class="flex transform hover:scale-95 duration-300 w-2/3">
                                        <div class="bg-white pl-3 py-2.5 rounded-bl-full rounded-tl-full border-l border-b border-t">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" class="text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input wire:model="search" type="text" class="w-1/2 pl-2 bg-white text-sm rounded-tr-full rounded-br-full focus:outline-none border-t border-r border-b" placeholder="Cari peserta didik...">
                                    </div>
                                </div>
                                <div class="w-1/2 grid justify-end">
                                    <button onclick="location.href='{{ route('report',[$this->period,$this->kelass,$this->dkelasId]) }}'" class="transform hover:scale-95 duration-300 text-sm bg-green-500 border border-green-500 hover:bg-green-600 rounded-full text-white py-2 px-7 focus:outline-none shadow-lg flex-shrink-0 flex justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download -pt-0.5 mr-1.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                            Download Laporan
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if ($murids!=[])
                    <table class="table-fixed w-full text-center" id="myTable">
                        <thead style="background-color: #262466;">
                            <tr>
                                <th class="flex-shrink-0 flex justify-center items-center text-sm font-normal px-4 py-2.5 text-white w-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                          </svg>
                                          <div class="ml-2">
                                            Nama Peserta Didik
                                        </div>
                                </th>
                                @foreach ($months as $m)
                                    <th class="text-sm font-normal px-4 py-2.5 text-white w-44">
                                        {{$month[$m]}}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($murids as  $key=>$mur)
                                <tr class="hover:bg-gray-200 border border-gray-100">
                                    <th class="text-sm border border-gray-100 font-semibold text-gray-700 text-left pl-13 py-2.5">{{ $murid[$mur->murid_id] }}
                                    </th>
                                    @foreach ($months as $m)
                                    @php
                                        $ua = $uas->where('murid_id',$mur->id)->where('month',$m);
                                    @endphp
                                        @if ($ua=='[]')
                                        <th class="hover:bg-gray-300 border border-gray-100 py-2.5">
                                            <div class="text-xs font-semibold text-gray-500">
                                                Rp {{number_format($suas)}},-
                                            </div>
                                        </th>
                                            @else
                                            @foreach ($ua as $u)
                                            @if ($u->keterangan=='LUNAS')
                                            <th class="hover:bg-green-100 border border-gray-100 py-2.5">
                                                <div disabled="disabled" class="shadow-inner rounded-full bg-green-500 mx-7 py-0.5 -my-0.5 text-sm text-white font-normal">
                                                    Lunas
                                                </div>
                                            </th>
                                            @else
                                            <th class="hover:bg-red-100 border border-gray-100 py-2.5">
                                                <div class="shadow-inner rounded-full bg-red-500 mx-7 py-0.5 -my-0.5 text-sm text-white font-normal">
                                                    Rp {{number_format($suas-$u->jumlah)}},-
                                                </div>
                                            </th>
                                            @endif
                                            @endforeach
                                            @endif
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

