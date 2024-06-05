<nav class="sticky top-0 border-b border-b-gray-200 w-full bg-white">

    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 mt-1 mr-2 text-right z-10">
            @auth
                {{-- <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-black-600 hover:text-black-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a> --}}
            @else
                <a href="{{ route('login') }}" class="text-sm font-medium text-black-600 hover:text-black-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm font-medium text-black-600 hover:text-black-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="max-w-8xl sm:px-6 lg:px-3">
        <div class="items-center h-20 grid grid-cols-12">
            @auth
                <div class="col-span-2"></div>
                <div class="flex items-center col-span-6 gap-6">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo(text).png') }}" alt="Logo" class="h-12 w-auto">
                    </a>
                    <!-- Navbar links -->
                    <a href="{{ route('home') }}" class="text-black px-3 py-2 text-sm font-medium">Home</a>
                    <a href="{{ route('home') }}/#services" class="text-black px-3 py-2 text-sm font-medium">Services</a>
                    <a href="#team" class="text-black px-3 py-2 text-sm font-medium">Our Team</a>
                    <a href="#" class="text-black px-3 py-2 text-sm font-medium">About Us</a>
                    <a href="#" class="text-black px-3 py-2 text-sm font-medium">Contact Us</a>
                </div>
                <div class="flex items-center col-span-4">
                    @admin
                        <button type="button" class="px-8 py-3 bg-white border-2 border-rose-500 rounded-full font-semibold text-xs text-rose-500" onclick="window.location='{{ route('dashboard') }}'">
                            Dashboard
                        </button>
                    @endadmin
                    &ensp;&ensp;
                    <button type="button" class="px-4 py-3 bg-gradient-to-r from-[#fe866e] from-40% to-[#f43f5e] to-100% border border-transparent rounded-full font-semibold text-xs text-white" onclick="window.location='{{ route('appointments.index') }}'">
                        Book an Appointment
                    </button>
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>
                                        @admin
                                            <span class="text-xs">(admin)</span> 
                                        @endadmin
                                        {{ Auth::user()->name }}
                                    </div>
        
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
        
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            @else
                <div class="col-span-2"></div>
                <div class="flex items-center col-span-7 gap-6">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo(text).png') }}" alt="Logo" class="h-12 w-auto">
                    </a>
                    <!-- Navbar links -->
                    <a href="{{ route('home') }}" class="text-black px-3 py-2 text-sm font-medium">Home</a>
                    <a href="{{ route('home') }}/#services" class="text-black px-3 py-2 text-sm font-medium">Services</a>
                    <a href="#team" class="text-black px-3 py-2 text-sm font-medium">Our Team</a>
                    <a href="#" class="text-black px-3 py-2 text-sm font-medium">About Us</a>
                    <a href="#" class="text-black px-3 py-2 text-sm font-medium">Contact Us</a>
                </div>
                <div class="flex items-center col-span-2">
                    <button type="button" class="px-2 py-3 bg-gradient-to-r from-[#fe866e] from-40% to-[#f43f5e] to-100% border border-transparent rounded-full font-semibold text-xs text-white" onclick="window.location='{{ route('appointments.index') }}'">
                        Book an Appointment
                    </button>
                </div>
            @endauth
        </div>
    </div>
</nav>