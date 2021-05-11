<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">

            @if($isOpen)
                    @include('livewire.pengeluaran.form')
            @endif
                <div class="mt-9 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">


                    <div class="w-full text-center">
                        <div class="text-xl font-bold text-blue-900">
                            Pengeluaran Uang Asrama
                        </div>
                        <div class="w-full mt-2.5">
                            <input wire:model="search" type="text" class="w-4/12 py-2 hover:bg-gray-100 text-sm text-center focus:outline-none border border-gray-200" placeholder="Cari pengeluaran untuk...">
                        </div>
                    </div>


                    <div class="flex mb-4">
                    <div class="w-full md:w-1/2">
                        <button
                        wire:click="showModal()"
                        {{-- onclick="location.href='{{ route('create_spend') }}'" --}}
                        class="focus:outline-none text-base bg-blue-700 hover:bg-blue-900 text-white py-2 px-6">
                                          Input Pengeluaran
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
                        <thead class="border border-blue-900 bg-blue-900">
                            <tr>
                                <th class="text-base font-normal px-4 py-2 text-white w-20">No</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Tanggal Pengeluaran</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Pengeluaran Untuk</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Satuan</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Harga</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($spends as  $key=>$spend)
                            <tr class="border border-gray-100 hover:bg-gray-200">
                                <td class="text-sm px-2 py-3">{{$key+1}}.</td>
                                <td class="text-sm">{{ date('d-m-Y', strtotime($spend->tgl)) }}</td>

                                <td class="text-sm">{{ $barangs[$spend->barang_id] }}</td>
                                <td class="text-sm">{{ $spend->jumlah }} {{ $stuan[$spend->barang_id] }}</td>
                                <td class="text-sm">Rp {{ $spend->harga }},-</td>
                                <td>
                                    <button wire:click="edit({{ $spend->id }})" class="text-sm bg-blue-700 hover:bg-blue-900 text-white py-2 px-6 focus:outline-none">
                                    Edit
                                    </button>
                                    <button wire:click="delete({{ $spend->id }})" class="text-sm bg-red-700 hover:bg-red-900 text-white py-2 px-6 focus:outline-none">
                                    Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                          {{$spends->links()}}
                    </div>

                </div>

            </div>
</div>

