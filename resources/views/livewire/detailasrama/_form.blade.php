
            <div  id="form" class=" text-center">
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full ">
                <form>
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div>
                          <h1 class="font-bold text-center mb-4">ANGGOTA ASRAMA {{$asrama[$dasrama[$asrama_id]]}}</h1>
                        </div>
                            <div>
                                <div class="mb-2">
                                    <input wire:model="dmurid_id" type="hidden"class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" >
                                </div>
                                <div class="mb-2">
                                  <input wire:model="asrama_id" type="hidden" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" >
                                </div>
                                <div class="mb-2" wire:ignore>
                                  <label for="anggota" class="block">Murid</label>
                                  {{ Form::select('anggota[]',$anggota,null,
                                    ['class' => 'shadow appearance-none border rounded  py-2 px-3 text-blue-900','id' => 'anggota','wire:model'=>'anggota','multiple'=>'true','style'=>'width:33vw'])}}


                                </div>
                          </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                      <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button id="simpan" wire:click.prevent="store()"   type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                          Submit
                        </button>
                      </span>
                    </div>
                </form>
            </div>
        </div>
