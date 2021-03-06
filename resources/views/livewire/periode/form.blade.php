<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>


      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;


      <div class="inline-block align-bottom bg-white -lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div>
              <h1 class="font-bold text-center mb-4">INPUT SEMESTER</h1>
            </div>
              <div>
                  <div class="mb-2">
                      <input wire:model="periodeId" type="hidden" class="shadow appearance-none border w-full py-2 px-3 text-blue-900" placeholder="Input semester">
                  </div>
                  <div class="mb-2">
                      <label for="year" class="block py-1">Tahun</label>
                      <input wire:model="year" type="number" class="shadow appearance-none border w-full py-2 px-3 text-blue-900 text-sm" placeholder="Input tahun">
                      @error('year') <h1 class="text-red-500">{{$message}}</h1>@enderror
                  </div>
                  <div class="mb-2">
                      <label for="period" class="block py-1">Periode</label>
                      {{ Form::select('period',$semester,null,
                        ['class' => 'border w-full py-2 px-3 text-blue-900 text-sm focus:outline-none','id' => 'period','wire:model'=>'period','placeholder'=>'- Pilih Semester -'])}}
                      @error('period') <h1 class="text-red-500">{{$message}}</h1>@enderror
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
