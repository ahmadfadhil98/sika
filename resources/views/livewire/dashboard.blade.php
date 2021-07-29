<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-10">

        <div class="w-full mt-3 px-10 flex">
            <div class="w-1/2 flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" class="text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <a href="/report_masuk" class="hover:underline text-gray-600 text-xs focus:outline-none ml-1.5">
                    Laporan Uang Masuk
                </a>
                <div class="text-gray-300 text-sm font-thin mx-2 -mt-0.5">
                    |
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" class="text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <a href="/report_keluar" class="hover:underline text-gray-600 text-xs focus:outline-none ml-1.5">
                    Laporan Uang Keluar
                </a>
            </div>
            <div class="w-1/2 grid justify-end">
                <div class="flex text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" class="text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    <a href="/tagihan" class="hover:underline focus:outline-none text-xs ml-1.5 mr-1">
                        Lihat Tagihan Per Kelas
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign text-gray-600"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                </div>
            </div>
        </div>

                <div class="shadow-xl rounded-t-lg px-10 py-4">

                    <div class="flex mb-4">
                        <div class="w-full -mt-0.5 pb-2 text-center">
                            <div class="text-xl font-extrabold text-blue-900">
                                Pembayaran Uang Asrama
                            </div>
                            <div class="w-full mt-1">
                                <div class="w-full flex-shrink-0 flex justify-center items-center">
                                    <div class="flex transform hover:scale-95 duration-300 w-1/4 px-6">
                                        <div class="bg-white py-2 pl-3 rounded-bl-full rounded-tl-full border-l border-b border-t">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" class="text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input wire:model="search" type="text" class="w-full py-1 pl-2 bg-white text-sm rounded-tr-full rounded-br-full focus:outline-none border-t border-r border-b" placeholder="Ketik untuk mencari...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table-fixed w-full text-center">
                        <thead style="background-color: #262466;">
                            <tr>
                                <th class="text-sm font-normal px-16 py-2.5 text-white w-20">No</th>
                                <th class="text-sm font-normal py-2.5 text-white w-48">Nomor Induk Siswa (NIS)</th>

                                <th class="text-sm font-normal py-2.5 text-white w-40">Kelas</th>
                                <th class="flex text-sm text-left font-normal px-15 py-2.5 text-white w-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>
                                      <div class="ml-2">
                                        Nama Peserta Didik
                                    </div>
                                </th>
                                <th class="text-sm font-normal rounded-tr-full px-16 py-2.5 text-white w-80">Pembayaran Uang Asrama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($murids as  $key=>$murid)
                            <tr class="border border-gray-100 hover:bg-gray-200">
                                <td class="text-gray-600 text-sm px-16 py-3">({{ $murids->firstitem() + $key }})</td>
                                <td class="text-gray-600 text-sm">{{ $murid->nis }}</td>
                                <td class="text-gray-600 text-sm ">{{ $n_kelas[$dkelas[$murid->kelas_id]] }}</td>
                                <td class="text-gray-600 text-sm font-semibold px-15 text-left">{{ $murid->name }}</td>
                                <td class="text-gray-600 text-sm px-16">
                                    <button onclick="location.href='{{ route('dmurid', [$murid->id,31]) }}'" class="transform hover:scale-95 duration-300 justify-center bg-yellow-300 rounded-full hover:bg-yellow-400 focus:outline-none py-1.5 w-full flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" class="pt-1 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                          </svg>
                                        <div class="text-sm text-gray-600">
                                            Info Pembayaran
                                        </div>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                          {{$murids->links()}}
                    </div>

                </div>

            </div>
</div>

