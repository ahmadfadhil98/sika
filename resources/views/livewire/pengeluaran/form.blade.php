<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;

      <div class="inline-block align-bottom bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div>
              <h1 class=" font-bold text-center mb-4">PENGELUARAN UANG ASRAMA </h1>
            </div>
              <div>
                    <div class="mb-2">
                        <input wire:model="spendId" type="hidden" class="border w-full py-2 px-3 text-blue-900">
                    </div>
                    <div class="mb-2">
                        <label for="tgl" class="block py-1">Tanggal Pembayaran</label>
                        <div class="mt-1 relative border">
                          <input type="date" wire:model="tgl" name="tgl" id="tgl" class="focus:outline-none block w-full py-2 pl-3 pr-20 sm:text-sm border-gray-300">
                          <div class="absolute inset-y-0 right-0 flex items-center">
                            <input type="button" wire:click='today()' class="text-sm bg-blue-700 leading-6 text-white hover:bg-blue-900 transition ease-in-out duration-150 w-full py-2 px-3" value="Hari ini">
                          </div>
                        </div>
                        @error('tgl') <h1 class="text-red-500">{{$message}}</h1>@enderror
                    </div>
                    <div class="mb-2">
                        <label for="barang_id" class="block py-1">Barang</label>
                        {{ Form::select('barang_id',$barangs,null,
                        ['class' => 'border w-full py-2 px-3 text-blue-900 text-sm focus:outline-none','id' => 'barang_id','wire:change'=>'satuan()','wire:model'=>'barang_id','placeholder'=>'- Pilih barang -'])}}
                        @error('barang_id') <h1 class="text-red-500">{{$message}}</h1>@enderror
                    </div>
                    <div class="mb-2">
                        <label for="jumlah" class="block py-1">Jumlah</label>
                        <div class="mt-1 relative border">
                          <input type="number" wire:model="jumlah" name="jumlah" id="jumlah" class="focus:outline-none block w-full py-2 pl-3 pr-15 sm:text-sm border-gray-300" wire:change="rupiahh()" placeholder="  Input jumlah pembayaran">
                          <div class="absolute inset-y-0 right-0 flex items-center">
                            <span class="text-gray-500 sm:text-sm pr-3">
                                {{$satuan}}
                            </span>
                          </div>
                        </div>
                        @error('jumlah') <h1 class="text-red-500">{{$message}}</h1>@enderror
                    </div>
                    <div class="mb-2">
                        <label for="harga" class="block py-1">Harga</label>
                        <div class="mt-1 relative border">
                          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">
                              Rp
                            </span>
                          </div>
                          <input type="number" wire:change="rupiahj()" wire:model="harga" name="harga" id="harga" class="focus:outline-none block w-full py-2 pr-3 pl-10 sm:text-sm border-gray-300" placeholder="  Input harga pembayaran">
                        </div>
                        @error('harga') <h1 class="text-red-500">{{$message}}</h1>@enderror
                    </div>
                    <div class="mb-2">
                        <label for="keterangan" class="block py-1">Keterangan</label>
                        <input wire:model="keterangan" type="textarea" class="border w-full py-2 px-3 text-blue-900 text-sm focus:outline-none" placeholder="Keterangan tambahan...">
                    </div>
              </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full border border-transparent px-4 py-2 bg-blue-700 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-900 focus:outline-none focus:border-blue-900 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Simpan
            </button>
          </span>
          <span class="mt-3 flex w-full shadow-sm sm:mt-0 sm:w-auto">
            <button wire:click="hideModal()" type="button" class="inline-flex justify-center w-full border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Batal
            </button>
          </span>
        </div>
       </form>
      </div>

    </div>
  </div>
