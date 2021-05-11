<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">

                <div class="mt-9 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">

                    <div class="w-full text-center mb-4">
                        <div class="text-xl font-bold text-blue-900">
                            Laporan Uang Masuk
                        </div>
                        <div class="text-sm text-blue-900 mt-2">
                            Untuk menampilkan <b>Laporan Uang Masuk</b>, Klik "Pilih uang masuk" dan "Pilih bulan"
                        </div>
                        <div class="text-center mt-2 text-sm">
                            {{ Form::select('period',$periode,null,
                            ['class' => 'border border-gray-100 hover:bg-gray-100 text-gray-700 py-2 px-6 mt-4 focus:outline-none','id' => 'period','wire:change'=>'month()','wire:model'=>'period','placeholder'=>'- Pilih uang masuk semester -'])}}


                            {{ Form::select('month',$months,null,
                            ['class' => 'border border-gray-100 hover:bg-gray-100 text-gray-700 py-2 px-6 mt-4 focus:outline-none','id' => 'month','wire:model'=>'month','placeholder'=>'- Pilih bulan -'])}}
                        </div>

                        @if ($this->period!=0&&$this->month!=0)
                            <div class="w-full text-right">
                                <button onclick="location.href='{{ route('report',[$this->period,$this->month,3]) }}'" class="bg-green-500 hover:bg-green-800 text-white py-2 px-6">
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

                    <table class="table-fixed w-full text-center" id="myTable">
                        <thead class="border border-blue-900 bg-blue-900">
                            <tr>
                                <th class="text-base font-normal px-4 py-2 text-white w-2/12">Tanggal</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Nama Peserta Didik</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Kelas</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Uang Masuk
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $date = 0;
                            @endphp
                            @foreach($tgl as  $key=>$t)
                            <tr class="border border-gray-100">
                                @if ($date != $t->tgl)
                                    @foreach ($angsuran as $a)
                                        @if ($a->tgl == $t->tgl)
                                        <td class="text-sm border border-gray-100 px-2 py-3" rowspan="{{ $a->span}}">{{date('d-m-Y', strtotime($t->tgl)) }}</td>
                                        @endif
                                    @endforeach
                                @endif
                                <td class="text-sm border border-gray-100 px-2 py-3"> {{ $murid[$dmurid[$uas_dmurid[$t->uas_id]]] }} </td>
                                <td class="text-sm border border-gray-100 px-2 py-3"> {{ $kelas[$dkelas[$dmuridkelas[$uas_dmurid[$t->uas_id]]]] }} </td>
                                <td class="text-sm border border-gray-100 px-2 py-3">Rp {{number_format($t->jumlah)}},-</td>
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

