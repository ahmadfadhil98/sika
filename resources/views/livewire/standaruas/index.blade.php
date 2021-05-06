<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-12">
                <div class="text-base text-white text-blue-50">
                   Database Standar Uang Asrama
              </div>

              <div class="mt-3 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">
                <div class="flex mb-4">
                <div class="w-full md:w-1/2">
                    <button wire:click="showModal()" class="text-base bg-blue-700 hover:bg-blue-900 text-white py-2 px-6">
                                          Input Standar Uang Asrama
                        </button>
                    </div>
                    <div class="w-full md:w-1/2">
                        <input wire:model="search" type="text" class="shadow appearance-none  w-full py-2 px-3 text-blue-900" placeholder="Cari standar uang asrama...">
                    </div>
                    </div>


                    @if($isOpen)
                         @include('livewire.standaruas.form')
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

                    <table class="table-fixed w-full text-center">
                        <thead class="bg-blue-900">
                            <tr>
                                <th class="text-base font-normal px-4 py-2 text-white w-20">No</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Periode</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Standar</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($muas as  $key=>$mua)
                            <tr>
                                <td class="px-2 py-3">{{ $muas->firstitem() + $key }}</td>

                                <td>{{ $periode[$mua->periode_id] }}</td>
                                <td>Rp. {{ $mua->jumlah }},-</td>
                                <td>
                                    <button wire:click="edit({{ $mua->id }})" class="text-sm bg-blue-700 hover:bg-blue-900 text-white py-2 px-6">
                                    Edit
                                    </button>
                                    <button wire:click="delete({{ $mua->id }})" class="text-sm bg-red-700 hover:bg-red-900 text-white py-2 px-6">
                                    Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                          {{$muas->links()}}
                    </div>

                </div>

            </div>
</div>

