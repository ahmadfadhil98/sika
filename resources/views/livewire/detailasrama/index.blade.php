<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-5">

                @if($isOpen)
                         @include('livewire.detailasrama.form')
                @endif

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg px-4 py-4">

                    <div class="flex mb-4">
                    <div class="w-full md:w-1/2">
                        <button wire:click="showModal()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded">
                                          Input Detail Asrama
                        </button>
                        {{ Form::select('period',$periode,null,
                        ['class' => 'bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded mb-2','id' => 'period','wire:model'=>'period','placeholder'=>'- Pilih periode -'])}}
                    </div>
                    <div class="w-full md:w-1/2">
                        <input wire:model="search" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Cari asrama...">
                    </div>
                    </div>

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

                    <table class="table-fixed w-full">
                        <thead class="bg-blue-500">
                            <tr>
                                <th class="px-4 py-2 text-white w-20">No</th>
                                <th class="px-4 py-2 text-white w-auto">Asrama</th>
                                <th class="px-4 py-2 text-white w-auto">Pembina Asrama</th>
                                <th class="px-4 py-2 text-white w-auto">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dasrama as  $key=>$asrama)
                            <tr>
                                <td class="px-2 py-3">{{ $dasrama->firstitem() + $key }}</td>

                                <td>{{ $asrama->asrama }}</td>
                                <td> {{ $pemas[$asrama->binsis_id] }} </td>
                                <td>
                                    <button onclick="location.href='{{ route('aasrama', [$asrama->id,2]) }}'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                    Anggota
                                    </button>
                                    <button wire:click="edit({{ $asrama->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                    Edit
                                    </button>
                                    <button wire:click="delete({{ $asrama->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">
                                    Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                          {{$dasrama->links()}}
                    </div>

                </div>

            </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <script>
      $(document).ready(function() {
        //   $('#asrama_id').select2();

          $('#periode_id').change(function(e) {
            val = $(this).val();
            console.log(val);
          });
      });
  </script>

