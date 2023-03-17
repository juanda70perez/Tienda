<header class="bg-trueGray-700 sticky top-0 z-50" x-data="dropdown()">
    <div class='container flex items-center h-16  md:justify-start'>
        <a :class="{ ' bg-opacity-100 text-Orange-500':open }" x-on:click="show()"
            class="flex flex-col order-last md:order-first items-center justify-center px-2 md:px-4  text-white cursor-pointer font-semibold h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="text-sm hidden md:block">{{ __('Categories') }}</span>
        </a>
        <a href="" class="flex-1 md:flex-none md:mx-6 ">
            <x-application-mark class="block h-9 w-auto" />
        </a>
        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>


        <div class="flex mx-1 md:mx-6 relative">
            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">

                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>

                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <div class="border-t border-gray-200"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="fas fa-user-circle text-white text-xl cursor-pointer">

                        </i>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                            </x-jet-dropdown-link>

                            <x-dropdown-link href="{{ route('register') }}">
                                {{ __('Register') }}
                                </x-jet-dropdown-link>
                    </x-slot>
                </x-dropdown>
            @endauth
        </div>
        <x-dropdownLanguaje />
        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>

    </div>

    <nav id="navigation-menu" x-cloak x-show="open" class="bg-trueGray-700 bg-opacity-25 w-full absolute">
        {{-- menu computador --}}
        <div class="container h-full hidden md:block">
            <div x-on:click.away="close()" class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-trueGray-500 hover:bg-Orange-500 hover:text-white ">

                            <a href="" class="py-2 px-4 text-sm flex items-center">
                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>
                                {{ __($category->name) }}
                            </a>

                            <div class="navigation-submenu bg-trueGray-100 absolute w-3/4 h-full top-0 right-0 hidden">
                                <x-navigation-subcategories :category="$category" />

                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="col-span-3 bg-trueGray-100">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>
            </div>
        </div>
        {{-- menu mobil --}}
        <div class="bg-white  h-full overflow-y-auto">
            <div class=" bg-trueGray-300 px-2 py-3 mb-2">
                @livewire('search')
            </div>
            <ul>
                @foreach ($categories as $category)
                    <li class=" text-trueGray-500 hover:bg-Orange-500 hover:text-white ">

                        <a href="" class="py-2 px-4 text-sm flex items-center">
                            <span class="flex justify-center w-9">
                                {!! $category->icon !!}
                            </span>
                            {{ __($category->name) }}
                        </a>


                    </li>
                @endforeach
            </ul>
            <p class="text-trueGray-500 px-6 my-2">{{ __('Shopping') }}</p>
            @livewire('cart-mobil')
        </div>

    </nav>

</header>
