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
              <h1 class=" font-bold text-center mb-4">BAYAR UANG ASRAMA {{$murid[$dmurid->murid_id]}}</h1>
            </div>
              <div>
                    <div class="mb-2">
                        <input wire:model="dmuridId" type="hidden" class="shadow appearance-none border w-full py-2 px-3 text-blue-900">
                    </div>
                    <div class="mb-2">
                        <label for="bulan" class="block py-1">Bulan</label>
                        {{ Form::select('bulan',$month,null,
                        ['class' => 'shadow appearance-none border w-full py-2 px-3 text-blue-900 text-sm','id' => 'bulan','wire:model'=>'bulan','placeholder'=>'- Pembayaran untuk bulan -'])}}
                        @error('bulan') <h1 class="text-red-500">{{$message}}</h1>@enderror
                    </div>
                    <div class="mb-2">
                        <label for="tgl" class="block py-1">Tanggal Pembayaran</label>
                        <input wire:model="tgl" type="date" class="shadow appearance-none border w-full py-2 px-3 text-blue-900 text-sm">
                    </div>
                    <div class="mb-2">
                        <label for="jumlah" class="block py-1">Jumlah</label>
                        <input type="number" wire:model="jumlah" name="jumlah" class="shadow appearance-none border w-full py-2 px-3 text-blue-900 text-sm" placeholder="Input jumlah pembayaran">
                        @error('jumlah') <h1 class="text-red-500">{{$message}}</h1>@enderror
                    </div>
                    <div class="mb-2">
                        <label for="keterangan1" class="block py-1">Status Pembayaran & Keterangan</label>
                        {{ Form::select('keterangan2',['LUNAS'=>'LUNAS','BELUM LUNAS'=>'BELUM LUNAS'],null,
                        ['class' => 'shadow appearance-none border w-full py-2 px-3 text-blue-900 text-sm','id' => 'keterangan1','wire:model'=>'keterangan1','placeholder'=>'- Pilih status pembayaran -'])}}
                    </div>
                    <div class="mb-2">
                        <input wire:model="keterangan2" type="textarea" class="shadow appearance-none border w-full py-2 px-3 text-blue-900 text-sm" placeholder="Keterangan tambahan...">
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
            <button wire:click="hideModal()" type="button" class="inline-flex justify-center w-full border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Batal
            </button>
          </span>
        </div>
       </form>
      </div>

    </div>
  </div>
