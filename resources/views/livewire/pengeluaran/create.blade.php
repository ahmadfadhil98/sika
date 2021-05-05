<div class="text-center">
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form id="add_name" name="add_name">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div>
              <h1 class="font-bold text-center mb-4">CREATE PENGELUARAN</h1>
            </div>
              <div id="dynamic_field">
                  <div class="flex flex-wrap -mx-3 mb-2">
                    @error('barang_id')
                    <h1 class="text-red-500">{{$message}}</h1>
                    @enderror
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <select name="barang_id[]" id="barang_id[]" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900">
                            <option disabled selected>Pilih Barang...</option>
                            @foreach ($barangs as $barang)
                                <option value="{{$barang->id}}">{{$barang->name}}</option>
                            @endforeach
                        </select>
                      <h1 class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Barang</h1>
                    </div>
                    <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                      <input name="jumlah[]" wire:model="jumlah" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" id="jumlah" type="number" placeholder="">
                      <h1 class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Jumlah</h1>
                    </div>
                    <div class="w-full md:w-1/12 px-3 mb-6 md:mb-0">
                      <button class="inline-flex  w-full rounded px py-2  text-base font-medium" disabled >
                        kg
                      </button>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                      <input name="harga[]" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" id="harga" wire:model="harga" type="number" placeholder="Harga Total">
                      <h1 class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Harga</h1>
                    </div>
                    <div class="w-full md:w-1/12 px-3 mb-6 md:mb-0">
                      <button id="add" type="button" class="inline-flex justify-center w-full rounded border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm">
                        +
                      </button>
                    </div>
                  </div>
              </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button id="submit" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <script>
        $(document).ready(function(){
        var i=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<div id="row'+i+'" class="flex flex-wrap -mx-3 mb-2"><div class="w-full md:w-1/3 px-3 mb-6 md:mb-0"><select name="barang_id[]" id="barang_id[]" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900"><option disabled selected>Pilih Barang...</option>@foreach ($barangs as $barang)<option value="{{$barang->id}}">{{$barang->name}}</option>@endforeach</select><h1 class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Barang</h1></div><div class="w-full md:w-1/6 px-3 mb-6 md:mb-0"><input name="jumlah[]" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" id="jumlah" type="number" placeholder=""><h1 class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Jumlah</h1></div><div class="w-full md:w-1/12 px-3 mb-6 md:mb-0"><button class="inline-flex  w-full rounded px py-2  text-base font-medium" disabled >kg</button></div><div class="w-full md:w-1/3 px-3 mb-6 md:mb-0"><input name="harga[]" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" id="harga" type="number" placeholder="Harga Total"><h1 class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Harga</h1></div><div class="w-full md:w-1/12 px-3 mb-6 md:mb-0"><button id="'+i+'" type="button" class="btn_remove inline-flex justify-center w-full rounded border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm">X</button></div></div>');
            });

            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });

            $('#submit').click(function(){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"pengeluaran",
                    method:"PUT",
                    data:$('#add_name').serialize(),
                    success:function(data)
                    {
                        alert(data);
                        $('#add_name')[0].reset();
                    }
                });
            });

        });
  </script>
