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
                        <div class="text-lg text-gray-600 font-semibold">
                            Detail Pembayaran
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" class="text-indigo-500 mx-1.5 pb-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                          </svg>
                        <div class="text-lg text-gray-600 font-semibold">
                            {{$month[$this->mont]}}
                        </div>
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
                    <div class="mt-5 w-full flex inline-flex items-center justify-center">
                        <div class="text-sm text-gray-600">
                            Status:
                        </div>
                        <div>
                        @if ($angsur!=[])
                            @if ($ketuas=='LUNAS')
                                <div disabled="disabled" class="px-3">
                                    <div class="text-sm text-green-500 font-semibold underline">
                                        LUNAS
                                    </div>
                                </div>
                            @else
                                <div disabled="disabled" class="px-3">
                                    <div class="text-sm text-red-500 font-semibold underline">
                                        BELUM LUNAS
                                    </div>
                                </div>
                            @endif
                        @endif
                        </div>
                    </div>
                </div>

                <div class="border-gray-200 mt-7 border-t"></div>

                @if ($angsur!=[])
                    @foreach ($angsur as $a)
                        <div class="mt-4">
                            <table class="w-full">
                                <tr>
                                    <td>
                                        <div class="flex mb-2 items-center">
                                            <div class="px-3 w-1/2 mt-1.5 text-sm font-bold text-gray-600">
                                                {{date('d-m-Y', strtotime($a->tgl))}}
                                            </div>
                                            <div class="px-3 w-1/2 flex-shrink-0 flex justify-end items-center">
                                                <button wire:click="edit({{ $a->id }})" class="transform hover:scale-95 duration-300 text-sm text-gray-600 items-center focus:outline-none flex hover:underline hover:text-indigo-500">
                                                <span class="pt-0.5">
                                                    Edit
                                                </span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit ml-1.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <div class="rounded-lg bg-white border border-gray-200 mx-3">
                                <table class="my-2 px-3">
                                    <tr>
                                        <td class="px-3 text-sm text-gray-600">Jumlah Pembayaran</td>
                                        <td class="px-3 text-sm text-gray-600">:
                                            <span class="font-bold pl-1"> Rp {{number_format($a->jumlah)}},- </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-3 text-sm text-gray-600">Keterangan</td>
                                        <td class="px-3 text-sm text-gray-600">:
                                            <span class="font-bold pl-1"> {{$a->keterangan}} </span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    @endforeach

                @else
                <div class="text-center">
                    <table>
                        <div class="mt-7 text-sm text-gray-600">
                            "Belum ada pembayaran"
                        </div>
                    </table>
                </div>
                @endif


        </div>
        <div style="background-color: #262466;" class="bg-gray-50 px-4 py-5 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="mt-3 mr-3 flex w-full shadow-sm sm:mt-0 sm:w-auto">
            <button wire:click="hideInfo()" type="button" class="transform hover:scale-95 duration-300 justify-center w-full text-sm text-gray-100 hover:underline focus:outline-none">
              Kembali
            </button>
          </span>
        </div>

      </div>

    </div>
  </div>
