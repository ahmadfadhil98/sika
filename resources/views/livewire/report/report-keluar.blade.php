<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 mt-12">

                <div class="text-base text-white text-blue-50">
                    Laporan Uang Keluar
                </div>

                <div class="mt-3 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">

                    <div class="text-xs text-blue-900 px-1 mt-1">
                        *Untuk melihat Laporan Uang Keluar, Klik <b>"Pilih uang keluar semester"</b> dan <b>"Pilih bulan"</b>
                    </div>

                    <div class="flex mb-4">
                        <div class="w-full md:w-1/2 text-left mt-4">
                            {{ Form::select('period',$periode,null,
                            ['class' => 'bg-gray-500 text-white py-2 px-6','id' => 'period','wire:change'=>'month()','wire:model'=>'period','placeholder'=>'- Pilih uang keluar semester -'])}}

                            {{ Form::select('month',$months,null,
                            ['class' => 'bg-gray-500 text-white py-2 px-6','id' => 'month','wire:model'=>'month','placeholder'=>'- Pilih bulan -'])}}
                        </div>

                        <div class="w-full md:w-1/2 text-right mt-4 ">
                            <button onclick="location.href='{{ route('report',[$this->period,$this->month,2]) }}'" class="bg-green-500 text-white py-2 px-6">
                                Laporan
                            </button>
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

                    <table class="table-fixed w-full text-center text-white" id="myTable">
                        <thead class="bg-blue-900">
                            <tr>
                                <th class="text-sm font-normal px-4 py-2 w-auto">Tanggal</th>
                                <th class="text-sm font-normal px-4 py-2 w-auto">Nama Barang</th>
                                <th class="text-xs font-normal px-4 py-2 w-auto">Lauk/Sayur</th>
                                @foreach ($barangs as $b)
                                    <th class="text-xs font-normal px-4 py-2 w-auto">{{$b->name}}</th>
                                @endforeach
                                {{-- <th class="w-auto">Air</th>
                                <th class="w-auto">Gas</th>
                                <th class="w-auto">Beras</th>
                                <th class="w-auto">Telur</th>
                                <th class="w-auto">MG</th>
                                <th class="w-auto">Pulsa</th>
                                <th class="w-auto">Alat Dapur</th>
                                <th class="w-auto">Token</th>
                                <th class="w-auto">Kecap</th>
                                <th class="w-auto">Gaji TK Masak</th>
                                <th class="w-auto">Pabukoan</th> --}}
                                <th class="text-sm font-normal px-4 py-2 w-auto">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $date = 0;
                            @endphp
                            @foreach($tgl as  $key=>$t)
                            <tr>
                                @php
                                    $span = count($pengeluaran->where('tgl',$t->tgl)->get());
                                @endphp
                                @if ($date != $t->tgl)
                                <td rowspan="{{ $span}}">{{$t->tgl }}</td>
                                @endif
                                <td> {{ $barang[$t->barang_id]}} {{$t->jumlah}} {{ $satuan[$t->barang_id]}} </td>
                                <td>
                                    @if ( $jenis[$peng[$t->id]] == 2 )
                                        {{$t->harga}}
                                    @endif
                                </td>
                                @foreach ($barangs as $b)
                                    <td>
                                        @if ( $barang[$peng[$t->id]] == $b->name )
                                            {{$t->harga}}
                                        @endif
                                    </td>
                                @endforeach
                                <td>{{$t->harga}}</td>
                            </tr>
                            @php
                                $date = $t->tgl;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                          {{$tgl->links()}}
                    </div>

                </div>

            </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <script>
    //   $(document).ready(function() {
    //     //   $('#kelas_id').select2();

    //       $('#periode_id').change(function(e) {
    //         val = $(this).val();
    //         console.log(val);
    //       });
    //   });
    //   $(document).ready(function() {
    //    var span = 1;
    //    var prevTD = "";
    //    var prevTDVal = "";
    //    $("#myTable tr td:first-child").each(function() { //for each first td in every tr
    //       var $this = $(this);
    //       console.log(1);
    //       if ($this.text() == prevTDVal) { // check value of previous td text
    //          span++;
    //          if (prevTD != "") {
    //             prevTD.attr("rowspan", span); // add attribute to previous td
    //             $this.remove(); // remove current td
    //          }
    //       } else {
    //          prevTD     = $this; // store current td
    //          prevTDVal  = $this.text();
    //          span       = 1;
    //       }
    //    });
    // });
  </script>

