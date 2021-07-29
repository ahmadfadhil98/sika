<x-guest-layout>
    <div style="background-color: #262466;" class="min-h-screen flex items-center justify-center">
        <div style="background-color: #1C1B57;" class="shadow-xl rounded-lg max-w-md w-full px-8 py-10">
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>
            <div class="text-base text-gray-200 font-semibold">
                Bantuan Masuk
            </div>
            <div class="mt-1 mb-5 text-xs text-gray-400 font-thin">
                {{ __('Kami akan mengirimkan pesan kepada Anda sehingga Anda dapat melakukan reset Kata Sandi.') }}
            </div>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="">
                        <label class="text-xs font-semibold text-gray-400" value="{{ __('Email') }}">Email Pengguna</label>
                        <input style="background-color: #2d2b72;" class="w-full shadow-xl rounded-md px-3 py-2 text-gray-200 focus:outline-none text-sm font-thin mt-1 placeholder-gray-300" placeholder="Ketik email pengguna" type="email" name="email" :value="old('email')" required autofocus>
                    </div>

                    <div class="items-center grid justify-center mt-8">
                        <x-jet-button class="flex rounded-full shadow-xl justify-center py-1.5 px-8 text-sm text-gray-200 bg-indigo-500 hover:bg-indigo-600 focus:outline-none transform hover:scale-95 duration-300">
                            {{ __('Kirim') }}
                        </x-jet-button>
                    </div>
                </form>
                <a href=" {{route('login')}} " class="mt-2 flex focus:outline-none text-indigo-500 text-xs font-semibold hover:text-indigo-400">
                    <div class="mr-1">
                        Login
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg"  height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in mt-1"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
                </a>
        </div>
    </div>

</x-guest-layout>
