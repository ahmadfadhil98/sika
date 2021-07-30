<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-10">

        <div class="w-full mt-3 px-10 flex">
            <div class="w-1/2 flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" class="text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <a href="{{route('report_masuk')}}" class="hover:underline text-gray-600 text-xs focus:outline-none ml-1.5">
                    Laporan Uang Masuk
                </a>
                <div class="text-gray-300 text-sm font-thin mx-2 -mt-0.5">
                    |
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" class="text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <a href="{{route('report_keluar')}}" class="hover:underline text-gray-600 text-xs focus:outline-none ml-1.5">
                    Laporan Uang Keluar
                </a>
            </div>
            <div class="w-1/2 grid justify-end">
                <div class="flex text-gray-600">
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

        {{-- Untuk Body --}}

            @if($isOpen)
                    @include('livewire.pengeluaran.form')
            @endif

            <div class="shadow-xl rounded-t-lg px-10 py-5">

                <div class="flex mb-4 w-full">
                    <div class="mt-4 w-1/3">
                        <button wire:click="showModal()" class="transform hover:scale-95 duration-300 text-sm bg-red-500 hover:bg-red-600 rounded-full text-white py-2 px-7 focus:outline-none shadow-lg">
                            Tambah Pengeluaran
                        </button>
                    </div>
                    <div class="w-full -mt-0.5 pb-2 text-center">
                        <div class="text-xl font-extrabold text-blue-900">
                            Pengeluaran Uang Asrama
                        </div>
                        <div class="w-full mt-1">
                            <div class="w-full flex-shrink-0 flex justify-center items-center">
                                <div class="flex transform hover:scale-95 duration-300 w-1/2 px-13">
                                    <div class="bg-white py-2 pl-3 rounded-bl-full rounded-tl-full border-l border-b border-t">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" class="text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input wire:model="search" type="text" class="w-full py-1 pl-2 bg-white text-sm rounded-tr-full rounded-br-full focus:outline-none border-t border-r border-b" placeholder="Cari pengeluaran...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/3"></div>
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
                        <thead style="background-color: #262466;">
                            <tr>
                                <th class="text-sm font-normal px-16 py-2.5 text-white w-20">No</th>
                                <th class="text-sm font-normal px-4 py-2.5 text-white w-48">Tanggal Pengeluaran</th>
                                <th class="text-sm font-normal px-4 py-2.5 text-white w-52">Peruntukan</th>
                                <th class="text-sm text-left pl-8 font-normal px-4 py-2.5 text-white w-48">Satuan Barang</th>
                                <th class="flex text-sm font-normal pl-6 py-2.5 text-white w-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign text-white"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                      <div class="ml-2">
                                        Harga Barang
                                    </div>
                                </th>
                                <th class="text-sm font-normal rounded-tr-full px-16 py-2.5 text-white w-80"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($spends as  $key=>$spend)
                            <tr class="border border-gray-100 text-gray-700 hover:bg-gray-200">
                                <td class="text-sm px-2 py-3">({{$key+1}})</td>
                                <td class="text-sm">{{ date('d-m-Y', strtotime($spend->tgl)) }}</td>

                                <td class="text-sm">{{ $barangs[$spend->barang_id] }}</td>
                                <td class="text-sm text-left pl-8">{{ $spend->jumlah }} {{ $stuan[$spend->barang_id] }}</td>
                                <td class="text-sm font-semibold text-left pl-11">Rp {{ $spend->harga }},-</td>
                                <td>
                                    <div class="flex-shrink-0 flex justify-center items-center">
                                        <button wire:click="edit({{ $spend->id }})" class="transform hover:scale-95 duration-300 text-sm text-gray-600 items-center focus:outline-none flex hover:underline hover:text-indigo-500">
                                            <span class="pt-0.5">
                                                Edit
                                            </span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit ml-1.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </button>
                                        <div class="border-l py-2 border-gray-200 mx-3"></div>
                                        <button wire:click="delete({{ $spend->id }})" class="transform hover:scale-95 duration-300 text-white bg-red-500 hover:bg-red-600 focus:outline-none py-2.5 px-2.5 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" class="" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
</div>

