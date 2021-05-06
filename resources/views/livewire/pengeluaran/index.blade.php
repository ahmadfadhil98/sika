<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-5">

            @if($isOpen)
                    @include('livewire.pengeluaran.form')
            @endif
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg px-4 py-4">

                    <div class="flex mb-4">
                    <div class="w-full md:w-1/2">
                        <button
                        wire:click="showModal()"
                        {{-- onclick="location.href='{{ route('create_spend') }}'" --}}
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded">
                                          Input Pengeluaran
                        </button>
                    </div>
                    <div class="w-full md:w-1/2">
                        <input wire:model="search" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Cari pengeluaran...">
                    </div>
                    </div>

                    @if(session()->has('info'))
                        <div class="bg-green-500 border-2 border-green-600 rounded-b mb-2 py-3 px-3">
                            <div>
                                <h1 class="text-white font-bold">{{ session('info') }}</h1>
                            </div>
                        </div>

                    @endif

                      @if(session()->has('delete'))
                        <div class="bg-red-500 border-2 border-red-600 rounded-b mb-2 py-3 px-3">
                            <div>
                                <h1 class="text-white font-bold">{{ session('delete') }}</h1>
                            </div>
                        </div>
                    @endif

                    <table class="table-fixed w-full">
                        <thead class="bg-blue-500">
                            <tr>
                                <th class="px-4 py-2 text-white w-20">No</th>
                                <th class="px-4 py-2 text-white w-auto">Barang</th>
                                <th class="px-4 py-2 text-white w-auto">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($spends as  $key=>$spend)
                            <tr>
                                <td class="px-2 py-3">{{ $spends->firstitem() + $key }}</td>

                                <td>{{ $barangs[$spend->barang_id] }}</td>
                                <td>
                                    <button wire:click="edit({{ $spend->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                    Edit
                                    </button>
                                    <button wire:click="delete({{ $spend->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">
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

