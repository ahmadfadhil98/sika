<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">

                <div class="mt-9 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">

                    <div class="w-full text-center mb-4">
                        <div class="text-xl font-bold text-blue-900">
                            Laporan Uang Keluar
                        </div>
                        <div class="text-sm text-blue-900 mt-2">
                            Untuk menampilkan <b>Laporan Uang Keluar</b>, Klik "Pilih uang keluar" dan "Pilih bulan"
                        </div>
                        <div class="text-center mt-2 text-sm">
                            {{ Form::select('period',$periode,null,
                            ['class' => 'border border-gray-100 hover:bg-gray-100 text-gray-700 py-2 px-6 mt-4 focus:outline-none','id' => 'period','wire:change'=>'month()','wire:model'=>'period','placeholder'=>'- Pilih uang keluar semester -'])}}

                            {{ Form::select('month',$months,null,
                            ['class' => 'border border-gray-100 hover:bg-gray-100 text-gray-700 py-2 px-6 mt-4 focus:outline-none','id' => 'month','wire:model'=>'month','placeholder'=>'- Pilih bulan -'])}}
                        </div>

                        @if ($this->period!=0&&$this->month!=0)
                            <div class="w-full text-right">
                                <button onclick="location.href='{{ route('report',[$this->period,$this->month,2]) }}'" class="bg-green-500 hover:bg-green-800 text-white py-2 px-6 focus:outline-none">
                                    Download Laporan
                                </button>
                            </div>
                        @endif
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

                    @if ($tgl!=[])
                    <table class="table-fixed w-full text-center" id="myTable">
                        <thead class="border border-blue-900 bg-blue-900 text-white">
                            <tr>
                                <th class="text-xs font-normal px-4 py-2 w-20">Tanggal</th>
                                <th class="text-xs font-normal px-4 py-2 w-auto">Nama Barang</th>
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
                                <th class="text-xs font-normal px-4 py-2 w-auto">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $date = 0;
                                // echo $pengeluaran;
                            @endphp
                            @foreach($tgl as  $key=>$t)
                            <tr class="border border-gray-100">
                                @if ($date != $t->tgl)
                                    @foreach ($pengeluaran as $key=>$a)
                                        @if ($a->tgl == $t->tgl)
                                        <td class="text-xs border border-gray-100 px-2 py-3" rowspan={{ $a->span}}">
                                            {{date('d-m-Y', strtotime($t->tgl)) }}
                                        </td>
                                        @endif
                                    @endforeach
                                @endif
                                <td class="text-xs border border-gray-100 px-2 py-3"> {{ $barang[$t->barang_id]}} {{$t->jumlah}} {{ $satuan[$t->barang_id]}} </td>
                                <td class="text-xs border border-gray-100 px-2 py-3">
                                    @if ( $jenis[$peng[$t->id]] == 2 )
                                        Rp {{number_format($t->harga)}},-
                                    @endif
                                </td>
                                @foreach ($barangs as $b)
                                    <td class="text-xs border border-gray-100 px-2 py-3">
                                        @if ( $barang[$peng[$t->id]] == $b->name )
                                            Rp {{($t->harga)}},-
                                        @endif
                                    </td>
                                @endforeach
                                <td class="text-xs border border-gray-100 px-2 py-3">Rp{{number_format($t->harga)}},-</td>
                            </tr>
                            @php
                                $date = $t->tgl;
                            @endphp
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan=2 class="text-sm font-bold py-3">
                                    Jumlah
                                </td>
                                @foreach ($kredit1 as $k1)
                                    <th class="text-xs font-normal px-4 py-2 w-auto">
                                        Rp{{number_format($k1->kredit)}},-
                                    </th>
                                @endforeach
                                @foreach ($barangs as $b)
                                    <th class="text-xs font-normal px-4 py-2 w-auto">
                                        @foreach ($kredit2 as $k2)
                                            @if ( $k2->barang_id == $b->id )
                                                Rp{{number_format($k2->kredit)}},-
                                            @endif
                                        @endforeach
                                    </th>
                                @endforeach
                            </tr>
                        </tfoot>
                    </table>
                    <div class="mt-4">
                          {{-- {{$tgl->links()}} --}}
                    </div>
                    @endif
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

