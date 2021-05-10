<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="">
              </div>

                <div class="mt-9 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">

                    <div class="flex mb-4">
                        <div class="w-full md:w-1/2" id="content">
                            <h2 class="text-xl font-bold px-1 text-blue-900">
                                PEMBAYARAN UANG ASRAMA
                                <h2 class="text-base px-1 text-blue-900">
                                    SMAN 2 Harau (Boarding School)
                        </div>
                        <div class="w-full md:w-1/2">
                            <input wire:model="search" type="text" class="shadow appearance-none  w-full mt-1.5 py-2 px-3 text-blue-900" placeholder="Cari peserta didik...">
                        </div>
                        </div>

                    <table class="table-fixed w-full text-center">
                        <thead class="bg-blue-900">
                            <tr>
                                <th class="text-base font-normal px-4 py-2 text-white w-20">No</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Kelas</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">NIS</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Nama</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($murids as  $key=>$murid)
                            <tr>
                                <td class="px-2 py-3">{{ $murids->firstitem() + $key }}</td>
                                <td>{{ $n_kelas[$dkelas[$murid->kelas_id]] }}</td>
                                <td>{{ $murid->nis }}</td>
                                <td>{{ $murid->name }}</td>
                                <td>
                                    <button onclick="location.href='{{ route('dmurid', [$murid->id,31]) }}'" class="text-sm bg-gray-500 hover:bg-gray-700 text-white py-2 px-6">
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

