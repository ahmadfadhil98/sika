<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;


      <div class="inline-block align-bottom bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

            <div class="font-bold text-base text-center">
                Detail Pembayaran Bulan {{$month[$this->mont]}}
            </div>


            <div class="mt-5">
              {{-- <h1 class=" font-bold text-center mb-4">BAYAR UANG ASRAMA {{$murid[$dmurid->murid_id]}}</h1> --}}

            </div>
            @if ($angsur!=[])
                @foreach ($angsur as $a)
                    <div class="border mb-5 py-2">
                        <table>
                            <tr>
                                <td class="px-3 font-bold">{{date('d-m-Y', strtotime($a->tgl))}}</td>
                            </tr>
                        </table>
                                <div class="border-t mt-2"></div>
                        <table class="mt-2 px-3">
                            <tr>
                                <td class="px-3 text-sm">Jumlah Pembayaran</td>
                                <td class="px-3 text-sm">: <b>Rp {{$a->jumlah}},-</b></td>
                            </tr>
                            <tr>
                                <td class="px-3 text-sm">Keterangan</td>
                                <td class="px-3 text-sm">: {{$a->keterangan}}</td>
                            </tr>
                        </table>
                    </div>
                @endforeach
                @if ($ketuas=='LUNAS')
                    <div class="text-center">
                        <button disabled="disabled" class="text-sm bg-green-500 text-white py-2 px-6">{{$ketuas}}</button>
                    </div>
                @else
                    <div class="text-center">
                        <button disabled="disabled" class="text-sm bg-red-500 text-white py-2 px-6">{{$ketuas}}</button>
                    </div>
                @endif


            @else
            <div class="border mb-5 py-3 text-center">
                <table>
                    <div class="text-lg font-bold underline">
                        Rp 0,-
                    </div>
                    <div class="mt-1.5 text-sm">
                        Belum ada pembayaran
                    </div>
                </table>
            </div>
            @endif


        </div>
        <div class="mt-1.5 bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="mt-3 flex w-full shadow-sm sm:mt-0 sm:w-auto">
            <button wire:click="hideInfo()" type="button" class="inline-flex justify-center w-full border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Kembali
            </button>
          </span>
        </div>
       </form>
      </div>

    </div>
  </div>
