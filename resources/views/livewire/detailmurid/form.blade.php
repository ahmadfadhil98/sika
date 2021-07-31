<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-5 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 transition-opacity">
        <div class="bg-gray-400 absolute inset-0 opacity-50"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;

      <div class="bg-gray-100 inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form>
            <div class="bg-gray-100 px-6 py-8 rounded-t-lg">
                <div class="grid justify-center">
                    <div class="text-lg text-gray-600 font-semibold text-center">
                        Bayar Uang Asrama
                    </div>
                    <div class="mt-1 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" class="text-indigo-500 mr-1.5 -mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-indigo-500 font-semibold text-base mr-1.5">
                            {{ $murid[$dmurid->murid_id]}}
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" class="text-gray-400 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <div class="text-gray-600 font-thin text-sm pt-0.5">
                            {{$periode[$periodes->id]}}
                        </div>
                    </div>
                </div>

                <div class="border-gray-200 mt-7 border-t"></div>

                <div class="mt-7">
                        {{-- <div class="mb-2">
                            <input wire:model="dmuridId" type="hidden" class="border w-full py-2 px-3 text-blue-900">
                            <input wire:model="dinfoId" type="hidden" class="border w-full py-2 px-3 text-blue-900">
                        </div> --}}
                        <div class="mb-2">
                            <label for="bulan" class="mb-1 block text-xs font-semibold text-gray-400">
                                Untuk Bulan
                            </label>
                            {{ Form::select('bulan',$month,null, ['class' => 'bg-white border border-gray-200 w-full rounded-md px-3 py-2 text-gray-600 focus:outline-none text-sm mt-1 placeholder-gray-100','id' => 'bulan','wire:model'=>'bulan','placeholder'=>'- Pilih pembayaran bulan -'])}}
                            @error('bulan')
                            <h1 class="text-red-500 focus:outline-none">{{$message}}</h1>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="tgl" class="mb-1 block text-xs font-semibold text-gray-400">
                                Tanggal Pembayaran
                            </label>
                            <div class="relative">
                                <input type="date" wire:model="tgl" name="tgl" id="tgl" class="border border-gray-200 bg-white focus:outline-none block w-full py-2 pl-3 pr-20 sm:text-sm rounded-md text-gray-600">
                                <div class="ml-3 absolute inset-y-0 right-0 flex items-center">
                                    <input type="button" wire:click='today()' class="bg-indigo-500 text-xs font-semibold rounded-xl leading-6 text-white hover:underline transform hover:scale-95 duration-300 w-full px-3 rounded-full shadow-md mr-1" value="Hari ini">
                                </div>
                            </div>
                            @error('tgl') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div>

                        <div class="mt-3">
                            <label for="jumlah" class="mb-1 block text-xs font-semibold text-gray-400">Jumlah</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-sm text-gray-600 sm:text-sm">
                                    Rp
                                    </span>
                                </div>
                            <input type="number" wire:model="jumlah" name="jumlah" id="jumlah" class="border border-gray-200 bg-white w-full rounded-md py-2 text-gray-600 focus:outline-none text-xs font-thin mt-1 placeholder-gray-400 block pr-3 pl-10 sm:text-sm" placeholder="...">
                            </div>
                            @error('jumlah') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div>

                        <div class="mt-3">
                            <label for="keterangan1" class="mb-1 block text-xs font-semibold text-gray-400">Status Pembayaran & Keterangan</label>
                            {{ Form::select('keterangan2',['LUNAS'=>'LUNAS','BELUM LUNAS'=>'BELUM LUNAS'],null,
                            ['class' => 'border border-gray-200 bg-white w-full rounded-md px-3 py-2 text-gray-600 focus:outline-none text-sm placeholder-gray-600','id' => 'keterangan1','wire:model'=>'keterangan1','placeholder'=>'- Pilih status pembayaran -'])}}
                        </div>
                        <div class="mt-1 mb-3">
                            <input wire:model="keterangan2" type="textarea" class="border border-gray-200 bg-white w-full rounded-md px-3 py-2 text-gray-600 focus:outline-none text-sm font-thin mt-1 placeholder-gray-400" placeholder="Keterangan">
                        </div>
                </div>
            </div>

        <div style="background-color: #262466;" class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <span class="flex w-full shadow-sm sm:ml-4 sm:w-auto">
                <button wire:click.prevent="store()" type="button" class="transform hover:scale-95 duration-300 justify-center w-full px-6 py-2 bg-indigo-500 hover:bg-indigo-600 rounded-full text-sm text-gray-100 shadow-md focus:outline-none">
                Simpan
                </button>
            </span>
            <span class="mt-3 mr-3 flex w-full shadow-sm sm:mt-0 sm:w-auto">
                <button wire:click="hideModal()" type="button" class="transform hover:scale-95 duration-300 justify-center w-full text-sm text-gray-100 hover:underline focus:outline-none">
                Batal
                </button>
            </span>
        </div>

       </form>
      </div>

    </div>
  </div>
