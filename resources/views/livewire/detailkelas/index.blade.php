<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 mt-12">
                <div class="text-base text-white text-blue-50">
                   Pengelompokan Kelas
                </div>

                @if($isOpen)
                         @include('livewire.detailkelas.form')
                @endif

                <div class="mt-3 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">

                    <div class="flex mb-4">
                    <div class="w-full md:w-1/2">
                        <button wire:click="showModal()" class="text-base bg-blue-700 hover:bg-blue-900 text-white py-2 px-6">
                                          Input Detail Kelas
                        </button>
                        {{ Form::select('period',$periode,null,
                        ['class' => 'bg-gray-500 text-white py-2 px-6','id' => 'period','wire:model'=>'period','placeholder'=>'- Pilih semester -'])}}
                    </div>
                    <div class="w-full md:w-1/2">
                        <input wire:model="search" type="text" class="shadow appearance-none  w-full py-2 px-3 text-blue-900" placeholder="Cari kelas...">
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
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Kelas</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Wali Kelas</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dkelas as  $key=>$kelas)
                            <tr>
                                <td class="px-2 py-3">{{ $dkelas->firstitem() + $key }}</td>

                                <td>{{ $kelas->kelas }}</td>
                                <td> {{ $walas[$kelas->walas_id] }} </td>
                                <td>
                                    <button onclick="location.href='{{ route('akelas', [$kelas->id,2]) }}'" class="text-sm bg-gray-500 hover:bg-gray-700 text-white py-2 px-6">
                                    Lihat Anggota Kelas
                                    </button>
                                    <button wire:click="edit({{ $kelas->id }})" class="text-sm bg-blue-700 hover:bg-blue-900 text-white py-2 px-6">
                                    Edit
                                    </button>
                                    <button wire:click="delete({{ $kelas->id }})" class="text-sm bg-red-700 hover:bg-red-900 text-white py-2 px-6">
                                    Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                          {{$dkelas->links()}}
                    </div>

                </div>

            </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <script>
      $(document).ready(function() {
        //   $('#kelas_id').select2();

          $('#periode_id').change(function(e) {
            val = $(this).val();
            console.log(val);
          });
      });
  </script>

