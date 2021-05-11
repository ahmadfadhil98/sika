<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">

                <div class="mt-9 bg-white dark:bg-gray-800 overflow-hidden shadow px-4 py-4">

                    <div class="flex mb-4">
                    <div class="w-full md:w-1/2 mt-1.5">
                        <button wire:click="create()" class="text-base bg-blue-700 hover:bg-blue-900 text-white py-2 px-6 focus:outline-none focus:ring-blue-900 focus:border-blue-900 focus:z-10">
                            Bayar Uang Asrama {{$periode[$periodes->id]}}
                        </button>
                    </div>

                    <div class="w-full md:w-1/2 text-right">
                        <div class="text-xl font-bold px-1 text-blue-900">
                            Info Pembayaran
                        </div>
                        <div class="text-base px-1 text-blue-900">
                            Uang Makan - {{ $murid[$dmurid->murid_id]}}
                        </div>
                    </div>

                    </div>
                    @if($isInfo)
                        @include('livewire.detailmurid.info')
                    @endif

                    @if($isOpen)
                         @include('livewire.detailmurid.form')
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
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Pembayaran Bulan</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Status Pembayaran</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto">Tagihan</th>
                                <th class="text-base font-normal px-4 py-2 text-white w-auto"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($months as $key=>$m)

                            <tr>
                                <td class="px-2 py-3">{{ $key+1 }}</td>
                                <td> {{$month[$m]}} </td>

                                @if (count($uas->where('keterangan','LUNAS')->where('month',$m))!=0)
                                    <td class="text-center">
                                        <button disabled="disabled" class="text-sm bg-green-500 text-white py-2 px-6">LUNAS</button>
                                    </td>
                                    <td class="px-3 text-sm">
                                        @php
                                            $jmlh = $uas->where('month',$m);
                                        @endphp
                                        @foreach ($uasperiode as $up)
                                            @foreach ($jmlh as $jml)
                                                Rp {{$up->jumlah-$jml->jumlah}},-
                                            @endforeach
                                        @endforeach
                                    </td>
                                @else
                                    <td class="text-center">
                                        <button disabled="disabled" class="text-sm bg-red-700 text-white py-2 px-6">BELUM LUNAS</button>
                                    </td>
                                    <td class="px-3 text-sm">
                                        @php
                                            $jmlh = $uas->where('month',$m);
                                        @endphp
                                        @foreach ($uasperiode as $up)
                                            @foreach ($jmlh as $jml)
                                                Rp {{$up->jumlah-$jml->jumlah}},-
                                            @endforeach
                                        @endforeach
                                    </td>
                                @endif

                                <td>
                                    <button wire:click="show({{$m}})" class="text-sm bg-gray-500 hover:bg-gray-700 text-white py-2 px-6 focus:outline-none">
                                    Detail Pembayaran
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

