<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 mt-12">

                <div class="text-base text-white text-blue-50">
                    Laporan Uang Masuk
                </div>

                <div class="mt-3 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">

                    <div class="text-xs text-blue-900 px-1 mt-1">
                        *Untuk melihat Laporan Uang Masuk, Klik <b>"Pilih uang masuk semester"</b> dan <b>"Pilih bulan"</b>
                    </div>

                    <div class="flex mb-4">
                        <div class="w-full md:w-1/2 text-left mt-4">
                            {{ Form::select('period',$periode,null,
                            ['class' => 'bg-gray-500 text-white py-2 px-6','id' => 'period','wire:change'=>'month()','wire:model'=>'period','placeholder'=>'- Pilih uang masuk semester -'])}}

                            {{ Form::select('month',$months,null,
                            ['class' => 'bg-gray-500 text-white py-2 px-6','id' => 'month','wire:model'=>'month','placeholder'=>'- Pilih bulan -'])}}
                        </div>

                        <div class="w-full md:w-1/2 text-right mt-4 ">
                            <button onclick="location.href='{{ route('report_masuks',[$this->period,$this->month]) }}'" class="bg-green-500 text-white py-2 px-6">
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

                    <table class="table-fixed w-full text-center" id="myTable">
                        <thead class="bg-blue-900">
                            <tr>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Tanggal</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Nama</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Kelas</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Jumlah
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $date = 0;
                            @endphp
                            @foreach($tgl as  $key=>$t)
                            <tr>
                                @if ($date != $t->tgl)
                                    @foreach ($angsuran as $a)
                                        @if ($a->tgl == $t->tgl)
                                        <td rowspan="{{ $a->span}}">{{$t->tgl }}</td>
                                        @endif
                                    @endforeach
                                @endif
                                <td> {{ $murid[$dmurid[$uas_dmurid[$t->uas_id]]] }} </td>
                                <td> {{ $kelas[$dkelas[$dmuridkelas[$uas_dmurid[$t->uas_id]]]] }} </td>
                                <td>{{$t->jumlah}}</td>
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

