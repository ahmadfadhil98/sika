<div style="background-color: #1C1B57;" class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-8 px-0.5">
        <div class="w-full flex-shrink-0 flex items-center">
            <div class="flex w-1/4 text-xs text-indigo-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe text-indigo-300"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                </svg>
                <div class="ml-2">
                    Website: <span class="font-normal text-gray-300">www.sman2harau.com</span>
                </div>
            </div>
            <div class="flex w-2/4 text-xs text-indigo-300 justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail text-indigo-300"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline>
                </svg>
                <div class="ml-2">
                    Email: <span class="font-normal text-gray-300">sman2harau@gmail.com & sman2_kecharau@yahoo.com</span>
                </div>
            </div>
            <div class="flex w-2/4 text-xs text-indigo-300 justify-end">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin text-indigo-300"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle>
                </svg>
                <div class="ml-2">
                    Alamat: <span class="font-normal text-gray-300">Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271</span>
                </div>
            </div>
        </div>
    </div>
</div>

<nav x-data="{ open: false }" style="background-color: #262466;">
    <!-- Primary Navigation Menu -->

    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex w-full justify-between h-20">
            <div class="flex w-1/2">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <img width="56" class="object-scale-down" src="https://sman2harau.sch.id/wp-content/uploads/2021/02/Logo-SMA-Negeri-2-Harau.png" alt="Workflow">
                    <div class="-mt-0.5 pl-4">
                        <div class="text-xl text-gray-200 font-bold">SMA Negeri 2 Harau</div>
                        <div class="text-xs text-gray-200 font-thin -mt-0.5">(Boarding School)</div>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex px-2">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <h1 class="text-base text-gray-200 transform hover:scale-95 duration-300 hover:text-indigo-300">
                            Home
                        </h1>
                    </x-jet-nav-link>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-8">
                    <x-jet-dropdown align="left" width="48">
                        <x-slot name="trigger">

                            <button class="flex transform hover:scale-95 duration-300 items-center text-base text-gray-200 hover:text-indigo-300 focus:text-indigo-300 focus:scale-95 focus:outline-none">
                                <div class="text-base">Transaksi</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="flex block px-4 pt-2 pb-3 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                <div class="text-xs ml-2">
                                    {{ __('Pengelolaan') }}
                                </div>
                            </div>
                            <div class="border-t border-gray-50"></div>
                            <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3" href="{{ route('uas') }}">
                                <h2 class="text-sm">Pemasukan</h2>
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3" href="{{ route('pengeluarans') }}">
                                <h2 class="text-sm">Pengeluaran</h2>
                            </x-jet-dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-8">
                    <x-jet-dropdown align="left" width="48">
                        <x-slot name="trigger">

                            <button class="flex transform hover:scale-95 duration-300 items-center text-base text-gray-200 hover:text-indigo-300 focus:text-indigo-300 focus:scale-95 focus:outline-none">
                                <div class="text-base">Laporan</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="flex block px-4 pt-2 pb-3 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <div class="text-xs ml-2">
                                    {{ __('Laporan Keuangan') }}
                                </div>
                            </div>
                            <div class="border-t border-gray-100"></div>
                            <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3" href="{{ route('report_masuk') }}">
                                <h2 class="text-sm">Uang Masuk</h2>
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3" href="{{ route('report_keluar') }}">
                                <h2 class="text-sm">Uang Keluar</h2>
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3" href="{{ route('tagihan') }}">
                                <h2 class="text-sm">Tagihan</h2>
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3200" href="{{ route('neraca') }}">
                                <h2 class="text-sm">Neraca</h2>
                            </x-jet-dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>


            <div class="flex w-1/2 justify-end">
                <div class="hidden sm:flex sm:items-center sm:ml-8">
                    <x-jet-dropdown align="left" width="48">
                        <x-slot name="trigger">

                            <button class="flex transform hover:scale-95 duration-300 items-center text-base text-gray-200 hover:text-indigo-300 focus:text-indigo-300 focus:scale-95 focus:outline-none">
                                <div class="text-base">Manajemen Database</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="flex block px-4 pt-2 pb-3 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                                <div class="text-xs ml-2">
                                    {{ __('Database Peserta Didik') }}
                                </div>
                            </div>
                            <div class="border-t border-gray-100"></div>
                            <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3" href="{{ route('murids') }}">
                                <h2 class="text-sm">Peserta Didik</h2>
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3" href="{{ route('kelas') }}">
                                <h2 class="text-sm">Kelas</h2>
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3" href="{{ route('asramas') }}">
                                <h2 class="text-sm">Asrama</h2>
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3" href="{{ route('periodes') }}">
                                <h2 class="text-sm">Semester</h2>
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="flex block px-4 pt-3 pb-3 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                                <div class="text-xs ml-2">
                                    {{ __('Database Pegawai') }}
                                </div>
                            </div>
                            <div class="border-t border-gray-100"></div>
                            <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3" href="{{ route('gurutendiks') }}">
                                <h2 class="text-sm">Pegawai Sekolah</h2>
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="flex block px-4 pt-3 pb-3 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                                <div class="text-xs ml-2">
                                    {{ __('Database Barang') }}
                                </div>
                            </div>
                            <div class="border-t border-gray-100"></div>
                            <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3" href="{{ route('barangs') }}">
                                <h2 class="text-sm">Barang</h2>
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="flex block px-4 pt-3 pb-3 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                                <div class="text-xs ml-2">
                                    {{ __('Lainnya') }}
                                </div>
                            </div>
                            <div class="border-t border-gray-100"></div>
                            <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3" href="{{ route('uasperiode') }}">
                                <h2 class="text-sm">Standar Uang Asrama</h2>
                            </x-jet-dropdown-link>
                        </x-slot>

                    </x-jet-dropdown>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-8">
                    <x-jet-dropdown align="left" width="48">
                        <x-slot name="trigger">

                            <button class="flex transform hover:scale-95 duration-300 items-center text-base text-gray-200 hover:text-indigo-300 focus:text-indigo-300 focus:scale-95 focus:outline-none">
                                <div class="text-base">Pengelompokan Data</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="flex block px-4 pt-2 pb-3 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                                <div class="text-xs ml-2">
                                    {{ __('Data Kelas & Asrama') }}
                                </div>
                            </div>
                            <div class="border-t border-gray-100"></div>

                            <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3" href="{{ route('dkelas') }}">
                                <h2 class="text-sm">Kelas</h2>
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3" href="{{ route('dasrama') }}">
                                <h2 class="text-sm">Asrama</h2>
                            </x-jet-dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>



            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-8">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex text-sm transform hover:scale-95 hover:border-indigo-300 duration-300 border-2 border-transparent rounded-full focus:outline-none focus:border-indigo-300">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="flex block px-4 pt-2 pb-3 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                            <div class="text-xs ml-2">
                                {{ __('Pengelola') }}
                            </div>
                        </div>
                        <div class="border-t border-gray-100"></div>
                        <x-jet-dropdown-link class="transform hover:scale-95 duration-300 hover:bg-gray-200 py-3" href="{{ route('profile.show') }}">
                            {{ __('Profil') }}
                        </x-jet-dropdown-link>

                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <div class="border-t border-gray-100"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach

                            <div class="border-t border-gray-100"></div>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link class="flex transform hover:scale-95 duration-300 bg-red-600 hover:bg-red-700 py-3" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                <span class="text-white mr-2">{{ __('Logout') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out text-white -mt-0.5"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>

                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                        {{ __('Create New Team') }}
                    </x-jet-responsive-nav-link>

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>

<div style="background:color #FFFFFA;" class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 rounded-br-full shadow-lg">
    <div class="w-full flex justify-between h-8 px-0.5">
        <div class="w-1/2 flex-shrink-0 flex items-center">
            <div class="text-gray-500 text-xs mr-2">
                Sistem Informasi Keuangan Asrama (SIKA) SMA Negeri 2 Harau
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pocket text-indigo-500"><path d="M4 3h16a2 2 0 0 1 2 2v6a10 10 0 0 1-10 10A10 10 0 0 1 2 11V5a2 2 0 0 1 2-2z"></path><polyline points="8 10 12 14 16 10"></polyline></svg>
        </div>
        <div class="w-1/2 flex-shrink-0 flex justify-end items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" class="text-gray-500 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            <div class="text-gray-500 text-xs mr-2">
                Sistem ini dikelola secara resmi oleh:
            </div>
            <div class="flex text-xs text-gray-500 bg-indigo-100 rounded-full shadow-inner py-0.5 px-3 font-semibold">
                <div class="mr-1">
                    Rosidah, S.Pd.
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="13" class="text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
        </div>
    </div>
</div>
