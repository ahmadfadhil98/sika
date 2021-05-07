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
              {{-- <h1 class=" font-bold text-center mb-4">BAYAR UANG ASRAMA {{$murid[$dmurid->murid_id]}}</h1> --}}
            </div>
            @if ($angsur!=[])
                @foreach ($angsur as $a)
                    <div class="border">
                        <table>
                            <tr>
                                <td>Tanggal</td>
                                <td>: {{$a->tgl}}</td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td>: {{$a->jumlah}}</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>: {{$a->keterangan}}</td>
                            </tr>
                        </table>
                    </div>
                @endforeach
            @else
                <div class="mb-2">
                    Belum Ada Pembayaran
                </div>
            @endif


        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="mt-3 flex w-full shadow-sm sm:mt-0 sm:w-auto">
            <button wire:click="hideInfo()" type="button" class="inline-flex justify-center w-full border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Batal
            </button>
          </span>
        </div>
       </form>
      </div>

    </div>
  </div>
