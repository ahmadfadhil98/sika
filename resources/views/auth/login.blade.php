<x-guest-layout>
    <div style="background-color: #262466;" class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div style="background-color: #1C1B57;" class="shadow-xl rounded-lg max-w-md w-full px-8 py-10">
            <div>
                <div class="flex">
                    <div class="items-center">
                        <div class="">
                            <div class="flex">
                                <div class="text-gray-400 text-xs mr-2">
                                    Sistem Informasi Keuangan Asrama (SIKA)
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pocket text-indigo-300"><path d="M4 3h16a2 2 0 0 1 2 2v6a10 10 0 0 1-10 10A10 10 0 0 1 2 11V5a2 2 0 0 1 2-2z"></path><polyline points="8 10 12 14 16 10"></polyline></svg>
                            </div>
                            <div class="mt-1 text-xl text-gray-200 font-bold">SMA Negeri 2 Harau</div>
                            <div class="mt-1 flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe text-indigo-300"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                </svg>
                                <a href="https://sman2harau.sch.id/" class="hover:underline focus:outline-none text-xs font-thin text-gray-400 ml-2">
                                    www.sman2harau.com
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="border-color: #262466;" class="mt-8 border-t"></div>
                <div class="mt-7 text-lg font-semibold text-gray-200">
                    Login
                </div>
                <div class="mt-1 text-xs font-thin text-gray-400">
                    Anda diharuskan Login sebelum melanjutkan!
                </div>
            </div>

          <x-jet-validation-errors class="text-xs font-thin mt-4" />

        @if (session('status'))
            <div class="font-medium text-sm text-blue-900">
                {{ session('status') }}
            </div>
        @endif
          <form class="" action="{{ route('login') }}" method="POST">
            @csrf
            <input type="hidden" name="remember" value="true">
            <div class="mt-5 shadow-xl space-y-2">
                <div>
                    <label for="username" class="text-gray-400 text-xs font-semibold">Nama Pengguna*</label>
                    <input style="background-color: #2d2b72;" id="username" name="username" type="text" :value="old('username')" required autofocus class="w-full shadow-xl rounded-md px-3 py-2 text-gray-200 focus:outline-none text-sm font-thin mt-1 placeholder-gray-300" placeholder="Ketik nama pengguna">
                </div>
                <div>
                    <label for="password" class="text-gray-400 text-xs font-semibold">Kata Sandi*</label>
                    <input style="background-color: #2d2b72;" id="password" type="password" name="password" required autocomplete="current-password" class="w-full rounded-md px-3 py-2 text-indigo-400 focus:outline-none text-sm font-normal mt-1 placeholder-gray-300" placeholder="Kata sandi">
                </div>
            </div>

            <div class="flex items-center justify-end">
                {{-- <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-500 focus:ring-indigo-500 focus:outline-none">
                    <label for="remember_me" class="ml-2 text-xs text-gray-400">
                    Ingat perangkat ini
                    </label>
                </div> --}}

                <div class="mt-1 text-xs underline text-indigo-400 hover:text-indigo-300">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Bantu masuk!') }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="mt-2 text-gray-500 text-xs flex">
                <div class="flex text-red-500 rounded-full mb-1.5 underline">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" class="text-red-500 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                    <div>
                        Peringatan
                    </div>
                </div>
            </div>
            <div class="text-gray-500 text-xs">
                Bagi semua pihak yang mengakses sistem ini tanpa izin pengelola, maka akan dikenakan <span class="font-bold">sanksi yang berat</span>.
            </div>

            <div class="mt-8 grid justify-center">
                <button class="flex rounded-full shadow-xl justify-center py-2 px-12 text-sm text-gray-200 bg-indigo-500 hover:bg-indigo-600 focus:outline-none transform hover:scale-95 duration-300">
                        <div class="mr-1.5">
                            Login
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in pt-1"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
                </button>
            </div>

          </form>
        </div>
      </div>
</x-guest-layout>

