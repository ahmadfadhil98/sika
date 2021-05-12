<x-guest-layout>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-blue-900">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Nama Pengguna') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Kata Sandi') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Ingatkan saya') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 hover:text-gray-400" href="{{ route('password.request') }}">
                        {{ __('Lupa kata sandi?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Masuk') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card> --}}
    <div class="min-h-screen flex items-center justify-center bg-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
          <div>
            <img class="object-scale-down h-36 w-full" src="https://sman2harau.sch.id/wp-content/uploads/2021/02/Logo-SMA-Negeri-2-Harau.png" alt="Workflow">
            <h2 class="mt-6 text-center text-2xl font-bold text-gray-900">
              Sistem Informasi Keuangan
            </h2>
            <p class="text-center text-base text-gray-600">
                SMAN 2 Harau (Boarding School)
            </p>
          </div>
          <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-blue-900">
                {{ session('status') }}
            </div>
        @endif
          <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <input type="hidden" name="remember" value="true">
            <div class="shadow-sm -space-y-px">
              <div>
                <label for="username" class="sr-only">Nama Pengguna</label>
                <input id="username" name="username" type="text" :value="old('username')" required autofocus class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none text-sm" placeholder="Nama pengguna">
              </div>
              <div>
                <label for="password" class="sr-only">Kata Sandi</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none text-sm" placeholder="Kata sandi">
              </div>
            </div>

            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-blue-300">
                <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                  Ingat Saya
                </label>
              </div>

              <div class="text-sm">
                @if (Route::has('password.request'))
                    <a class="font-medium text-blue-700 hover:text-blue-900" href="{{ route('password.request') }}">
                        {{ __('Lupa kata sandi?') }}
                    </a>
                @endif
              </div>
            </div>

            <div>
            <button class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-base font-medium text-white bg-blue-700 hover:bg-blue-900">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <!-- Heroicon name: solid/lock-closed -->
                    <svg class="h-5 w-5 group-hover:text-gray-400">
                      <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                  </span>
                  Masuk
            </button>
            </div>
          </form>
        </div>
      </div>
</x-guest-layout>

