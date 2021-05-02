<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>


      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;


      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div>
              <h1 class=" uppercase font-bold text-center mb-4">BAYAR UANG ASRAMA {{$murid[$dmurid->murid_id]}}</h1>
            </div>
              <div>
                    <div class="mb-2">
                        <input wire:model="dmuridId" type="hidden" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900">
                    </div>
                    <div class="mb-2">
                        {{ Form::select('mont',$month,null,
                        ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-blue-900','id' => 'mont','wire:model'=>'mont','placeholder'=>'Untuk Bulan'])}}
                        @error('mont') <h1 class="text-red-500">{{$message}}</h1>@enderror
                    </div>
                    <div class="mb-2">
                        {{ Form::select('jumlah',['750000'=>'Rp750.000,-'],null,
                        ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-blue-900','id' => 'jumlah','wire:model'=>'jumlah','placeholder'=>'Jumlah...'])}}
                        @error('mont') <h1 class="text-red-500">{{$message}}</h1>@enderror
                    </div>
                    <div class="mb-2"> <span>Attachments</span>
                        <div class="shadow appearance-none h-40 rounded border border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer">
                            <div class="absolute">
                                {{-- @if($this->) --}}
                                <div class="flex flex-col items-center ">
                                    <i class="fa fa-cloud-upload fa-3x text-gray-200"></i>
                                    <span class="block text-gray-400 font-normal">Attach you files here</span>
                                    <span class="block text-gray-400 font-normal">or</span>
                                    <span class="block text-blue-400 font-normal">Browse files</span>
                                </div>
                            </div>
                            <input type="file" class="h-full w-full opacity-0" name="">
                        </div>
                        <div class="flex justify-between items-center text-gray-400"> </div>
                    </div>
              </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Submit
            </button>
          </span>
          <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            <button wire:click="hideModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Cancel
            </button>
          </span>
        </div>
       </form>
      </div>

    </div>
  </div>
