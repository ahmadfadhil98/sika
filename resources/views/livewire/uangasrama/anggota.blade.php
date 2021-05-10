<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-5">

                <div class="mt-9 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4" >

                    <div class="flex mb-4">
                    <div class="w-full md:w-1/2 text-base py-2 px-1 font-bold" id="content">
                        Daftar Peserta Didik Kelas {{ $askes[$daskes[$this->kelas_id]]}}
                    </div>
                    <div class="w-full md:w-1/2">
                        <input wire:model="search" type="text" class="shadow appearance-none  w-full py-2 px-3 text-blue-900 focus:outline-none" placeholder="Cari nama...">
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
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Nama</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($murids as  $key=>$murid)
                            <tr>
                                <td class="px-2 py-3">{{ $murids->firstitem() + $key }}</td>
                                <td>{{ $murid->nis }}</td>
                                <td>{{ $murid->nama }}</td>
                                <td>
                                    <button onclick="location.href='{{ route('dmurid', [$murid->id,$this->di]) }}'" class="text-sm bg-gray-500 hover:bg-gray-700 text-white py-2 px-6 focus:outline-none">
                                        Info Pembayaran
                                    </button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                          {{$murids->links()}}
                    </div>

                </div>

            </div>


        </div>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <script>
        function myfunction(){
            document.getElementById("form").style.display = 'block' ;
        }
        $(document).ready(function() {
            $('#anggota').select2({
                placeholder: "Pilih Murid...",
            });
            $('#simpan').mouseover(function(e){
                var a = $('#anggota').val();
                @this.set('murid_id',a);
            });


        });
  </script>

