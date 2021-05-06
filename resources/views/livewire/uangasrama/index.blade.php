<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-12">
                <div class="text-base text-white text-blue-50">
                    Pemasukan Uang Asrama
                </div>

                <div class="mt-3 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">

                    <div class="flex mb-4">
                    <div>
                        {{ Form::select('sem',$periodes,null,
                        ['class' => 'bg-gray-500 text-white py-2 px-6','id' => 'sem','wire:change'=>'eksekusi()','wire:model'=>'sem','placeholder'=>'- Pilih semester -'])}}

                        {{ Form::select('jenis',['asrama' => 'Berdasarkan Asrama','kelas' => 'Berdasarkan Kelas'],null,
                        ['class' => 'bg-gray-500 text-white py-2 px-6','id' => 'jenis','wire:change'=>'eksekusi()','wire:model'=>'jenis','placeholder'=>'- Berdasarkan -'])}}
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

                    <table class="table-fixed w-full text-center">
                        <thead class="bg-blue-900">
                            <tr>
                                <th class="text-base font-normal px-4 py-2 text-white w-20">No</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Nama</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Penanggung Jawab</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uas as  $key=>$u)
                            <tr>
                                <td class="px-2 py-3">{{$key+1}}</td>
                                <td>{{ $u->askes }}</td>
                                <td>{{ $guten[$u->pj] }}</td>
                                <td>
                                    @if ($this->jenis=='asrama')
                                        <button onclick="location.href='{{ route('aasrama', [$u->id,21]) }}'" class="text-sm bg-gray-500 hover:bg-gray-700 text-white py-2 px-6">
                                            Anggota
                                        </button>
                                    @elseif ($this->jenis=='kelas')
                                        <button onclick="location.href='{{ route('akelas', [$u->id,31]) }}'" class="text-sm bg-gray-500 hover:bg-gray-700 text-white py-2 px-6">
                                            Anggota
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <div class="mt-4">

                    </div>

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
