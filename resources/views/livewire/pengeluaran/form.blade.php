<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-5 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 transition-opacity">
        <div class="bg-gray-400 absolute inset-0 opacity-50"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;

      <div class="bg-gray-100 inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form>
            <div class="bg-gray-100 px-6 py-5 rounded-t-lg">
                <div class="grid justify-center">
                    <div class="text-lg text-gray-600 font-semibold text-center">
                        Tambah Pengeluaran
                    </div>
                </div>

                <div class="border-gray-200 mt-4 border-t"></div>

                <div class="mt-4">
                    <div class="mb-2">
                        <input wire:model="spendId" type="hidden" class="border w-full py-2 px-3 text-blue-900">
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
                            <label for="barang_id" class="block text-xs font-semibold text-gray-400">Barang</label>
                            {{ Form::select('barang_id',$barangs,null,
                            ['class' => 'bg-white border border-gray-200 w-full rounded-md px-3 py-2 text-gray-600 focus:outline-none text-sm mt-1 placeholder-gray-600','id' => 'barang_id','wire:change'=>'satuan()','wire:model'=>'barang_id','placeholder'=>'- Pilih barang -'])}}
                            @error('barang_id') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div>
                        <div class="mt-3">
                            <label for="jumlah" class="mb-1 block text-xs font-semibold text-gray-400">Jumlah</label>
                            <div class="relative">
                            <input type="number" wire:model="jumlah" name="jumlah" id="jumlah" class="bg-white border border-gray-200 focus:outline-none rounded-md block w-full py-2 pl-3 pr-16 sm:text-sm text-gray-600 placeholder-gray-400" wire:change="rupiahh()" placeholder=" Input jumlah">
                            <div class="absolute inset-y-0 right-0 flex items-center">
                                <span class="text-gray-600 sm:text-sm pr-3">
                                    {{$satuan}}
                                </span>
                            </div>
                            </div>
                            @error('jumlah') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div>
                        <div class="mt-3">
                            <label for="harga" class="mb-1 block text-xs font-semibold text-gray-400">Harga</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-sm text-gray-600 sm:text-sm">
                                Rp
                                </span>
                            </div>
                            <input type="number" wire:change="rupiahj()" wire:model="harga" name="harga" id="harga" class="border border-gray-200 bg-white w-full rounded-md py-2 text-gray-600 focus:outline-none text-xs font-thin mt-1 placeholder-gray-400 block pr-3 pl-10 sm:text-sm" placeholder="...">
                            </div>
                            @error('harga') <h1 class="text-red-500">{{$message}}</h1>@enderror
                        </div>
                        <div class="mt-3">
                            <label for="keterangan" class="block text-xs font-semibold text-gray-400">Keterangan</label>
                            <input wire:model="keterangan" type="textarea" class="border border-gray-200 bg-white w-full rounded-md px-3 py-2 text-gray-600 focus:outline-none text-sm font-thin mt-1 placeholder-gray-400" placeholder="Keterangan">
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
