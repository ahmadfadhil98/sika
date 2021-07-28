<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            {{ config('app.name', 'Laravel') }}
        </title>
        <link rel="shortcut icon" type="image/x-icon" href="https://sman2harau.sch.id/wp-content/uploads/2021/02/Logo-SMA-Negeri-2-Harau.png">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script> --}}
    </head>
    <body class="font-sans antialiased">
        <div style="background-color: #F8F8FB;" class="min-h-screen">
            @livewire('navigation-dropdown')
            {{-- Heading di murid --}}

                {{ $slot }}

        </div>

        @stack('modals')

        @livewireScripts
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>

    </body>

    <div style="background-color: #F8F8FB;">
        <footer>
            <div class="bg-gray-200 max-w-full mx-auto px-4 sm:px-6 lg:px-8 rounded-tr-full">
                <div class="w-full flex justify-between h-8 px-0.5">
                </div>
            </div>
            <div class="bg-gray-200 max-w-full mx-auto px-4 sm:px-6 lg:px-8">
                <div class="w-full flex justify-between h-16 px-0.5">
                    <div class="w-full flex-shrink-0 flex items-center">
                        <div class="w-2/3 text-gray-500 text-sm -mt-7">
                                Copyright © Sistem Informasi Keuangan Asrama SMANDARA
                        </div>
                        <div class="w-1/3 justify-end -mt-7">
                            <div class="text-gray-500 text-xs flex">
                                <div class="flex text-red-600 rounded-full mb-1.5 underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" class="text-red-600 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-900 max-w-full mx-auto px-4 sm:px-6 lg:px-8">
                <div class="w-full flex justify-between h-5 px-0.5">
                </div>
            </div>
        </footer>
    </div>

</html>
