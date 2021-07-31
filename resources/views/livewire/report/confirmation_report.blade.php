<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-5 pb-20 text-center sm:block sm:p-0">

    <div class="fixed inset-0 transition-opacity">
        <div class="bg-gray-400 absolute inset-0 opacity-50"></div>
    </div>

    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;

    <div class="bg-gray-100 inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

        <div class="bg-gray-100 px-6 py-8 rounded-t-lg">
            <div class="grid justify-center">
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" class="text-yellow-400 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                      </svg>
                    <div class="text-bse text-gray-600">
                        Masukkan ke Neraca?
                    </div>
                </div>
            </div>
        </div>


        <div style="background-color: #262466;" class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <span class="flex w-full shadow-sm sm:ml-4 sm:w-auto">
                <button wire:click.prevent="reportNeraca()" type="button" class="transform hover:scale-95 duration-300 justify-center w-full px-6 py-2 bg-indigo-500 hover:bg-indigo-600 rounded-full text-sm text-gray-100 shadow-md focus:outline-none">
                    Ya
                </button>
            </span>
            <span class="mt-3 mr-3 flex w-full shadow-sm sm:mt-0 sm:w-auto">
                <button wire:click="hideReport()" type="button" class="transform hover:scale-95 duration-300 justify-center w-full text-sm text-gray-100 hover:underline focus:outline-none">
                    Tidak
                </button>
            </span>
          </div>
      </div>

    </div>
  </div>
