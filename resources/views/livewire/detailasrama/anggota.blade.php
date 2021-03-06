<div>
    @include('livewire.detailasrama._form')
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">

                <div class="mt-1 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4" >

                    <div class="flex mb-4">
                        <div class="w-full md:w-1/2" id="content">
                            <h2 class="text-base py-2 px-1 font-bold">
                                Nama-Nama Anggota Asrama
                        </div>
                        <div class="w-full md:w-1/2">
                            <input wire:model="search" type="text" class="shadow appearance-none  w-full py-2 px-3 text-blue-900" placeholder="Cari peserta didik...">
                        </div>
                    </div>

                    @if(session()->has('info'))
                        <div class="bg-green-500 mb-4 py-2 px-6">
                            <div>
                                <h1 class="text-white text-sm">{{ session('info') }}</h1>
                            </div>
                        </div>

                    @endif

                      @if(session()->has('delete'))
                        <div class="bg-red-700 mb-4 py-2 px-6">
                            <div>
                                <h1 class="text-white text-sm">{{ session('delete') }}</h1>
                            </div>
                        </div>
                    @endif

                    <table class="table-fixed w-full text-center">
                        <thead class="bg-blue-900">
                            <tr>
                                <th class="text-base font-normal px-4 py-2 text-white w-20">No</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">NIS</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Nama Peserta Didik </th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($murids as  $key=>$murid)
                            <tr>
                                <td class="px-2 py-3">{{ $key + 1 }}</td>
                                <td>{{ $murid->nis }}</td>
                                <td>{{ $murid->nama }}</td>
                                <td>
                                    <button id="memberout" wire:click="delete({{ $murid->id }})" class="text-sm bg-red-700 hover:bg-red-900 text-white py-2 px-6">
                                    Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                          {{-- {{$murids->links()}} --}}
                    </div>

                </div>

            </div>


        </div>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <script>
        function myfunction(){
            document.getElementById("form").style.display = 'block';
        }
        $(document).ready(function() {
            $('#anggota').select2({
                placeholder: "Pilih peserta didik...",
            });

            $('#simpan').mouseover(function(e){
                var a = $('#anggota').val();
                @this.set('murid_id',a);
            });

        });
  </script>

