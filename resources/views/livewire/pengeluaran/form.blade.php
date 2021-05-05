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
              <h1 class=" uppercase font-bold text-center mb-4">BAYAR UANG ASRAMA</h1>
            </div>
              <div>
                    <div class="mb-2">
                        <input wire:model="dmuridId" type="hidden" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900">
                    </div>
                    <div class="mb-2">
                        {{ Form::select('barang_id',$barangs,null,
                        ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-blue-900','id' => 'barang_id','wire:model'=>'barang_id','placeholder'=>'Untuk barang_id'])}}
                        @error('barang_id') <h1 class="text-red-500">{{$message}}</h1>@enderror
                    </div>
                    <div class="mb-2">
                        <input wire:model="jumlah" type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900">
                    </div>
                    <div class="mb-2">
                        <input wire:model="harga" type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900">
                    </div>


                    <div class="mb-2"> <span>Attachments</span>
                        <div class="shadow appearance-none h-40 rounded border border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer">

                                <div x-data="{photoName: null, photoPreview: null}" class="absolute">
                                    <!-- Profile Photo File Input -->

                                    <input type="file" id="bukti" class="hidden"
                                                wire:model="photo"
                                                x-ref="photo"
                                                x-on:change="
                                                        photoName = $refs.photo.files[0].name;
                                                        const reader = new FileReader();
                                                        reader.onload = (e) => {
                                                            photoPreview = e.target.result;
                                                        };
                                                        reader.readAsDataURL($refs.photo.files[0]);
                                                " />

                                    <!-- Current Profile Photo -->
                                    <div class="mt-2 text-center" x-show="! photoPreview">
                                        <i class="fa fa-cloud-upload fa-3x text-gray-200 text-center"></i>
                                        <span class="block text-gray-400 font-normal">Attach you files here</span>
                                        <span class="block text-gray-400 font-normal">or</span>
                                        <span class="block text-blue-400 font-normal">Browse files</span>
                                    </div>

                                    <!-- New Profile Photo Preview -->
                                    <div class="mt-2 text-center" x-show="photoPreview">
                                        <span class="block rounded-full w-20 h-20"
                                              x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                                        </span>
                                    </div>

                                    <x-jet-input-error for="photo" class="mt-2" />
                                </div>
                                <x-jet-secondary-button class="h-full w-full opacity-0" type="button" onclick="document.getElementById('bukti').click()">
                                </x-jet-secondary-button>

                        </div>

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
