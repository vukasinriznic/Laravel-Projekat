<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu (Header) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/">
                        <span class="text-xl font-bold">Vukasin Riznic</span>
                    </a>
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" style="width: 25px; height: auto; margin-left: 20px; margin-right: 50px;">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex w-full items-center">
                    <x-nav-link :href="auth()->check() ? route('dashboard') : url('/')">
                        {{ __('Pocetna stranica') }}
                    </x-nav-link>

                    <x-nav-link :href="route('katalog')" :active="request()->routeIs('katalog')">
                        {{ __('Katalog') }}
                    </x-nav-link>

                    <x-nav-link :href="'/kontakt'">
                        {{ __('Kontakt') }}
                    </x-nav-link>

                    @if (!auth()->check())
                        <div class="ml-auto flex space-x-8">
                            <x-nav-link :href="route('login')">
                                {{ __('Login') }}
                            </x-nav-link>

                            @if (Route::has('register'))
                                <x-nav-link :href="route('register')">
                                    {{ __('Register') }}
                                </x-nav-link>
                            @endif
                        </div>
                    @endif
                </div>



            </div>

            <!-- Pražan desni deo -->
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('katalog')" :active="request()->routeIs('katalog')">
                {{ __('Katalog') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="'#kontakt'">
                {{ __('Kontakt') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="'#o-nama'">
                {{ __('O nama') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>

