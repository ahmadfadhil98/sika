<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-12">

                <div class="text-base text-white text-blue-50">
                    Pengeluaran Uang Asrama
                </div>

            @if($isOpen)
                    @include('livewire.pengeluaran.form')
            @endif
                <div class="mt-3 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">

                    <div class="flex mb-4">
                    <div class="w-full md:w-1/2">
                        <button
                        wire:click="showModal()"
                        {{-- onclick="location.href='{{ route('create_spend') }}'" --}}
                        class="text-base bg-blue-700 hover:bg-blue-900 text-white py-2 px-6">
                                          Input Pengeluaran
                        </button>
                    </div>
                    <div class="w-full md:w-1/2">
                        <input wire:model="search" type="text" class="shadow appearance-none  w-full py-2 px-3 text-blue-900" placeholder="Cari pengeluaran...">
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
                        <thead class="bg-blue-900">
                            <tr>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Tanggal</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Barang</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Jumlah</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Harga</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($spends as  $key=>$spend)
                            <tr>
                                <td>{{ $spend->tgl }}</td>

                                <td>{{ $barangs[$spend->barang_id] }}</td>
                                <td>{{ $spend->jumlah }} {{ $stuan[$spend->barang_id] }}</td>
                                <td>Rp {{ $spend->harga }},-</td>
                                <td>
                                    <button wire:click="edit({{ $spend->id }})" class="text-sm bg-blue-700 hover:bg-blue-900 text-white py-2 px-6">
                                    Edit
                                    </button>
                                    <button wire:click="delete({{ $spend->id }})" class="text-sm bg-red-700 hover:bg-red-900 text-white py-2 px-6">
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

