<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-10">

        <div class="w-full mt-3 px-10 flex">
            <div class="w-1/3 flex">
                <a href="{{route('dashboard')}}" class="hover:underline text-gray-500 text-xs focus:outline-none mr-1.5">
                    Home
                </a>
                <div class="text-gray-300 mr-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
                </div>
                <button onClick="window.location.reload();" class="focus:outline-none hover:underline text-indigo-500 font-semibold text-xs">
                    Info Pembayaran
                </button>
            </div>
            <div class="w-2/3 grid justify-end items-center">
                <div class="flex text-gray-600">
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
                    <div class="text-gray-300 text-sm font-thin mx-2 -mt-0.5">
                        |
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                      </svg>
                    <a href="{{route('dashboard')}}" class="focus:outline-none hover:text-indigo-500 text-xs font-semibold underline">
                        Pembayaran Peserta Didik Lain ?
                    </a>
                </div>
            </div>
        </div>

        <div class="shadow-xl rounded-t-lg px-10 pt-5 pb-8 ">
            <div class="flex">
                <div class="w-full md:w-1/2">
                    <div class="text-xl pt-2 font-extrabold text-blue-900">
                        <a href="{{route('dashboard')}}">Info Pembayaran Uang Asrama</a>
                    </div>
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" class="text-indigo-500 mr-1.5 -mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-indigo-500 font-semibold text-base mr-1.5">
                            {{ $murid[$dmurid->murid_id]}}
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" class="text-gray-500 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                          </svg>
                        <div class="text-gray-600 text-sm pt-0.5">
                            {{$periode[$periodes->id]}}
                        </div>
                    </div>
                </div>

                <div class="w-full mt-4 text-right md:w-1/2">
                    <button wire:click="create()" class="transform hover:scale-95 duration-300 text-sm bg-indigo-500 hover:bg-indigo-600 rounded-full text-white py-2 px-7 focus:outline-none shadow-lg">
                        Bayar Uang Asrama
                    </button>
                </div>

            </div>

                <div>
                    @if($isInfo)
                        @include('livewire.detailmurid.info')
                    @endif

                    @if($isOpen)
                         @include('livewire.detailmurid.form')
                    @endif

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

                    <table class="mt-6 table-fixed w-full text-center">
                        <thead style="background-color: #262466;">
                            <tr>
                                <th class="text-sm font-normal px-16 py-2.5 text-white w-20">No</th>
                                <th class="text-sm font-normal px-4 py-2.5 text-white w-56">Pembayaran untuk Bulan</th>
                                <th class="text-sm font-normal px-4 py-2.5 text-white w-80">Status Pembayaran Uang Asrama</th>
                                <th class="flex text-sm font-normal justify-center py-2.5 text-white w-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign text-white"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                    <div class="ml-1.5">
                                        Tagihan
                                    </div>
                                </th>
                                <th class="text-sm font-normal rounded-tr-full px-12 py-2.5 text-white w-96">
                                    Detail Pembayaran Uang Asrama
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($months as $key=>$m)
                            <tr class="border border-gray-100 hover:bg-gray-200">
                                <td class="text-sm px-16 py-3">({{ $key+1 }})</td>
                                <td> {{$month[$m]}} </td>
                                @if (count($uas->where('keterangan','LUNAS')->where('month',$m))!=0)
                                    <td class="text-sm px-28">
                                        <div disabled="disabled" class="flex justify-center">
                                            <div class="text-sm text-green-500 font-semibold italic">
                                                Lunas
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" class="ml-1.5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                              </svg>
                                            </div>
                                    </td>
                                    <td class="text-sm font-semibold line-through text-green-500">
                                        @php
                                            $jmlh = $uas->where('month',$m);
                                        @endphp
                                        @foreach ($uasperiode as $up)
                                            @foreach ($jmlh as $jml)
                                                Rp {{number_format($up->jumlah-$jml->jumlah)}},-
                                            @endforeach
                                        @endforeach
                                    </td>
                                @elseif (count($uas->where('keterangan','BELUM LUNAS')->where('month',$m))!=0)
                                    <td class="text-sm px-24">
                                        <div disabled="disabled" class="flex py-0.5 border border-red-500 bg-red-500 justify-center">
                                            <div class="text-sm text-white">
                                                Belum Lunas
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" class="ml-1.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                              </svg>
                                            </div>
                                    </td>
                                    <td class="text-sm font-semibold underline text-gray-600">
                                        @php
                                            $jmlh = $uas->where('month',$m);
                                        @endphp
                                        @foreach ($uasperiode as $up)
                                            @foreach ($jmlh as $jml)
                                                Rp {{number_format($up->jumlah-$jml->jumlah)}},-
                                            @endforeach
                                        @endforeach
                                    </td>
                                @else
                                    <td class="text-sm px-16">
                                        <div disabled="disabled" class="flex border bg-white py-0.5 border-red-500 justify-center">
                                            <div class="text-sm text-red-500 font-thin">
                                                Belum ada pembayaran
                                            </div>
                                            </div>
                                    </td>
                                    <td class="text-sm font-semibold underline text-red-500">
                                        @foreach ($uasperiode as $up)
                                            Rp {{number_format($up->jumlah)}},-
                                        @endforeach
                                    </td>
                                @endif
                                <td class="text-sm px-28">
                                    <button wire:click="show({{$m}})" class="transform hover:scale-95 duration-300 justify-center bg-yellow-300 rounded-full hover:bg-yellow-400 focus:outline-none py-1.5 w-full flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" class="pt-1 mr-1.5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                          </svg>
                                          <div class="text-sm text-gray-600">
                                              Lihat Detail
                                          </div>

                                    </button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                </div>

                <div class="mt-3 w-full flex">
                    <div class="w-1/3 shadow-xl rounded-t-lg py-5 mr-5">
                        <div class="mt-5 px-10 text-gray-600 text-base font-bold">
                            Identitas Peserta Didik:
                        </div>
                        <div class="flex mt-2 px-10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" class="text-gray-500 mr-1.5 -mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="text-gray-600 text-xs">
                                {{ $murid[$dmurid->murid_id]}} ({{ $nis[$dmurid->murid_id]}})
                            </div>
                        </div>
                        <div class="mt-1 px-15 text-gray-600 text-xs">
                            {{ $namakelas[$kelasperiode_kelas[$dmurid->kelas_id]] }} ({{ $walas[$kelasperiode_walas[$dmurid->kelas_id]] }})
                        </div>
                    </div>
                    <div class="w-2/3 shadow-xl rounded-t-lg py-5">
                        <div class="mt-5 px-10 text-gray-600 text-base font-bold">
                            Tentang Pembayaran Uang Asrama!
                        </div>
                        <div class="mt-2 px-10 text-gray-600 text-sm">
                            Jumlah uang asrama yang dibayarkan sesuai standar pembayaran adalah <span class="font-semibold">Rp 800.000,-/bulan</span>.*
                        </div>
                        <div class="mt-1 px-10 text-gray-400 font-thin text-xs">
                            *) Di waktu tertentu jumlah ini bisa berubah, seperti pada masa Pembelajaran Jarak Jauh (PJJ), yaitu <span class="font-semibold">Rp 400.000,-/bulan</span>.
                        </div>
                    </div>
                </div>



            </div>


</div>

