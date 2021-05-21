<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">

                <div class="mt-9 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">

                    <div class="w-full text-center mb-6">
                        <div class="text-xl font-bold text-blue-900">
                            Pemasukan Uang Asrama
                        </div>
                        <div class="text-sm text-blue-900 mt-2">
                            Untuk menampilkan <b>Pemasukan Uang Asrama</b>, Klik "Pilih pemasukan semester" dan "Kelompokkan berdasarkan"
                        </div>
                        <div class="text-center mt-2 text-sm">
                            {{ Form::select('sem',$periodes,null,
                            ['class' => 'border border-gray-100 hover:bg-gray-100 text-gray-700 py-2 px-6 mt-4 focus:outline-none','id' => 'sem','wire:change'=>'eksekusi()','wire:model'=>'sem','placeholder'=>'- Pilih pemasukan semester -'])}}

                            {{ Form::select('jenis',['asrama' => 'Berdasarkan Asrama','kelas' => 'Berdasarkan Kelas'],null,
                            ['class' => 'border border-gray-100 hover:bg-gray-100 text-gray-700 py-2 px-6 mt-4 focus:outline-none','id' => 'jenis','wire:change'=>'eksekusi()','wire:model'=>'jenis','placeholder'=>'- Kelompokkan berdasarkan -'])}}
                        </div>
                    </div>


                    @if($isOpen)
                         @include('livewire.asrama.form')
                    @endif

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
                    @if($uas!=[])
                    <table class="table-fixed w-full text-center">
                        <thead class="border border-blue-900 bg-blue-900">
                            <tr>
                                <th class="text-base font-normal px-4 py-2 text-white w-20">No</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-3/12">Nama</th>
                                <th class="text-base text-left font-normal px-15 py-2 text-white w-3/12">Penanggung Jawab</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-80"></th>
                        </thead>

                        <tbody>
                            @foreach($uas as  $key=>$u)
                            <tr class="border border-gray-100 hover:bg-gray-200">
                                <td class="text-sm px-2 py-3">{{$key+1}}.</td>
                                <td class="text-sm">{{ $u->askes }}</td>
                                <td class="text-sm px-15 text-left">{{ $guten[$u->pj] }}</td>
                                <td class="text-sm px-15">
                                    @if ($this->jenis=='asrama')
                                        <button onclick="location.href='{{ route('aasrama', [$u->id,21]) }}'" class="text-sm text-black bg-yellow-300 hover:bg-yellow-400 bg-white focus:outline-none py-2 w-full">
                                            Daftar Peserta Didik
                                        </button>
                                    @elseif ($this->jenis=='kelas')
                                        <button onclick="location.href='{{ route('akelas', [$u->id,31]) }}'" class="text-sm text-black bg-yellow-300 hover:bg-yellow-400 bg-white focus:outline-none py-2 w-full">
                                            Daftar Peserta Didik
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <div class="mt-4">

                    </div>
                    @endif
                </div>

            </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <script>
        // function myfunction(){
        //     document.getElementById("jenis").style.display = 'block';
        // }
        // $(document).ready(function() {
        //     $('#anggota').select2({
        //         placeholder: "Pilih Murid...",
        //     });

        //     $('#simpan').mouseover(function(e){
        //         var a = $('#anggota').val();
        //         @this.set('murid_id',a);
        //     });

        // });
  </script>
