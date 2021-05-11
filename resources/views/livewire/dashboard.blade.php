<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">

                <div class="mt-9 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">

                    <div class="flex mb-4">
                        <div class="w-full text-center">
                            <div class="text-xl font-bold text-blue-900">
                                PEMBAYARAN UANG ASRAMA
                            </div>
                            <div class="text-base text-blue-900">
                                SMAN 2 Harau (Boarding School)
                            </div>
                            <div class="w-full mt-2.5">
                                <input wire:model="search" type="text" class="w-4/12 py-2 hover:bg-gray-100 text-sm text-center focus:outline-none border border-gray-200" placeholder="Ketik nama untuk mencari...">
                            </div>
                        </div>


                    </div>

                    <table class="table-fixed w-full text-center">
                        <thead class="border border-blue-900 bg-blue-900">
                            <tr>
                                <th class="text-base font-normal px-4 py-2 text-white w-20">No</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-1/6">NIS</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-1/6">Kelas</th>
                                <th class="text-base text-left font-normal px-15 py-2 text-white w-auto">Nama Peserta Didik</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Pembayaran Uang Asrama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($murids as  $key=>$murid)
                            <tr class="border border-gray-100 hover:bg-gray-200">
                                <td class="text-sm px-2 py-3">{{ $murids->firstitem() + $key }}.</td>
                                <td class="text-sm">{{ $murid->nis }}</td>
                                <td class="text-sm">{{ $n_kelas[$dkelas[$murid->kelas_id]] }}</td>
                                <td class="text-sm px-15 text-left">{{ $murid->name }}</td>
                                <td class="text-sm px-15">
                                    <button onclick="location.href='{{ route('dmurid', [$murid->id,31]) }}'" class="text-sm text-black bg-yellow-300 hover:bg-yellow-400 bg-white focus:outline-none py-2 w-full">
                                        Info Pembayaran
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

