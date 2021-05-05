<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg px-4 py-4">

                    <div class="flex mb-4">
                    <div class="w-full md:w-1/2">
                        {{ Form::select('sem',$periodes,null,
                        ['class' => 'bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded','id' => 'sem','wire:change'=>'eksekusi()','wire:model'=>'sem','placeholder'=>'- Pilih periode -'])}}

                        {{ Form::select('jenis',['asrama' => 'Berdasarkan Asrama','kelas' => 'Berdasarkan Kelas'],null,
                        ['class' => 'bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded','id' => 'jenis','wire:change'=>'eksekusi()','wire:model'=>'jenis','placeholder'=>'- Berdasarkan -'])}}
                    </div>
                    <div class="w-full md:w-1/2">
                        <input wire:model="search" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Cari asrama...">
                    </div>
                    </div>


                    @if($isOpen)
                         @include('livewire.asrama.form')
                    @endif

                    @if(session()->has('info'))
                        <div class="bg-green-500 border-2 border-green-600 rounded-b mb-2 py-3 px-3">
                            <div>
                                <h1 class="text-white font-bold">{{ session('info') }}</h1>
                            </div>
                        </div>

                    @endif

                    @if(session()->has('delete'))
                        <div class="bg-red-500 border-2 border-red-600 rounded-b mb-2 py-3 px-3">
                            <div>
                                <h1 class="text-white font-bold">{{ session('delete') }}</h1>
                            </div>
                        </div>
                    @endif

                    <table class="table-fixed w-full text-center">
                        <thead class="bg-blue-500">
                            <tr>
                                <th class="px-4 py-2 text-white w-20">No</th>
                                <th class="px-4 py-2 text-white w-auto">Nama</th>
                                <th class="px-4 py-2 text-white w-auto">Penanggung Jawab</th>
                                <th class="px-4 py-2 text-white w-auto">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uas as  $key=>$u)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $u->askes }}</td>
                                <td>{{ $guten[$u->pj] }}</td>
                                <td>
                                    @if ($this->jenis=='asrama')
                                        <button onclick="location.href='{{ route('aasrama', [$u->id,21]) }}'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                            Anggota
                                        </button>
                                    @elseif ($this->jenis=='kelas')
                                        <button onclick="location.href='{{ route('akelas', [$u->id,31]) }}'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                            Anggota
                                        </button>
                                    @endif
                                    <button wire:click="delete({{ $u->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">
                                    Hapus
                                    </button>
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
