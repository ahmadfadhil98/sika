<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-5">

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg px-4 py-4">

                    <div class="flex mb-4">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <button wire:click="create()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded mb-2">
                                          Bayar Uang Asrama
                        </button>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <input wire:model="search" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Search kelas...">
                    </div>
                    </div>


                    @if($isOpen)
                         @include('livewire.detailmurid.form')
                    @endif

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
                                <th class="px-4 py-2 text-white w-auto">Bulan</th>
                                <th class="px-4 py-2 text-white w-auto">Status</th>
                                <th class="px-4 py-2 text-white w-auto">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($months as $key=>$m)

                            <tr>
                                <td class="px-2 py-3">{{ $key+1 }}</td>
                                <td> {{$month[$m]}} </td>
                                <td class="text-center">
                                    @if (count($uas->where('month',$m))!=0)
                                        <button disabled="disabled" class="bg-green-500 text-white font-bold py-1 px-4 rounded">Lunas</button>
                                    @else
                                        <button disabled="disabled" class="bg-orange-500 text-white font-bold py-1 px-4 rounded">Belum Lunas</button>
                                    @endif
                                </td>
                                <td>
                                    <button wire:click="delete({{ $this->dmuridId }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">
                                    Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="mt-4">
                    </div>

                </div>



                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Build v{{ Illuminate\Foundation\Application::VERSION }}
                    </div>
                </div>
            </div>
</div>

