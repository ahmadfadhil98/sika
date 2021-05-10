<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="">
              </div>

                <div class="mt-9 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">

                    <div class="flex mb-4">
                        <div class="w-full md:w-1/2" id="content">
                            <h2 class="text-2xl font-bold text-gray-900 px-1">
                                PEMBAYARAN UANG ASRAMA
                                <h2 class="text-base px-1 text-gray-600">
                                    SMAN 2 Harau (Boarding School)
                        </div>
                        <div class="w-full md:w-1/2">
                            <input wire:model="search" type="text" class="shadow appearance-none  w-full mt-2.5 py-2 px-3 text-blue-900 focus:outline-none focus:ring-blue-900 focus:border-blue-900 focus:z-10" placeholder="Cari nama peserta didik...">
                        </div>
                        </div>

                    <table class="table-fixed w-full text-center">
                        <thead class="bg-blue-900">
                            <tr>
                                <th class="text-base font-normal px-4 py-2 text-white w-20">No</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">NIS</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Kelas</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-80">Nama</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-60"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($murids as  $key=>$murid)
                            <tr>
                                <td class="px-2 py-3">{{ $murids->firstitem() + $key }}</td>
                                <td>{{ $murid->nis }}</td>
                                <td>{{ $n_kelas[$dkelas[$murid->kelas_id]] }}</td>
                                <td>{{ $murid->name }}</td>
                                <td>
                                    <button onclick="location.href='{{ route('dmurid', [$murid->id,31]) }}'" class="text-sm bg-gray-500 hover:bg-gray-700 text-white py-2 px-6 focus:outline-none">
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

