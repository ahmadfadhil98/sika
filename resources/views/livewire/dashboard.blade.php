<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-10">

                <div style="background:color #FFFFFA;" class="mt-5 shadow-xl px-10 py-4">

                    <div class="flex mb-4">
                        <div class="w-full pt-2 pb-2 text-center">
                            <div class="text-xl font-extrabold text-blue-900">
                                PEMBAYARAN UANG ASRAMA
                            </div>
                            <div class="w-full mt-1">
                                <div class="w-full flex-shrink-0 flex justify-center items-center">
                                    <div class="flex transform hover:scale-95 duration-300 w-1/4">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="pt-1 mr-1 feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                        <div class="text-sm text-gray-600 ">
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

