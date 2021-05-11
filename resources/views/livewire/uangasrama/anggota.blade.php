<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 mt-5">

                <div class="mt-9 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4" >

                    <div class="flex mb-5 mt-1">
                        <div class="w-full text-center" id="content">
                            <div class="text-lg font-bold">
                                DAFTAR PESERTA DIDIK
                            </div>
                            <div class="text-base">
                                Kelas {{ $askes[$daskes[$this->kelas_id]]}}
                            </div>
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
                        <thead class="border border-blue-900 bg-blue-900">
                            <tr>
                                <th class="text-base font-normal px-4 py-2 text-white w-20">No</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-80">NIS</th>
                                <th class="text-base text-left font-normal px-15 py-2 text-white w-100">Nama Peserta Didik</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Pembayaran Uang Asrama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($murids as  $key=>$murid)
                            <tr class="border border-gray-100 hover:bg-gray-200">
                                <td class="text-sm px-2 py-3">{{$key+1 }}.</td>
                                <td class="text-sm">{{ $murid->nis }}</td>
                                <td class="text-sm px-15 text-left">{{ $murid->nama }}</td>
                                <td class="text-sm px-12">
                                    <button onclick="location.href='{{ route('dmurid', [$murid->id,$this->di]) }}'" class="text-sm hover:bg-gray-500 hover:text-white bg-white focus:outline-none shadow appearance-none py-2.5 w-full">
                                        Lihat Info Pembayaran
                                    </button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="py-5">
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

