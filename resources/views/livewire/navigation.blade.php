<style>
    #navigation-menu{
        height: calc(100vh - 4rem);
    }
    .navigation-link:hover .navigation-submenu{
        display: block !important;
    }
</style>
<header class="bg-trueGray-700 sticky top-0">
    <div class='container flex items-center h-16'>
        <a
            class="flex flex-col items-center justify-center bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span>{{ __('Categories') }}</span>
        </a>
        <a href="" class="mx-6">
            <x-application-mark class="block h-9 w-auto" />
        </a>
        @livewire('search')

        <div class="mx-6 relative">
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
        @livewire('dropdown-cart' )
    </div>

    <nav id="navigation-menu" class="bg-trueGray-700 bg-opacity-25 w-full absolute">
        <div class="container h-full">
            <div class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">
                    @foreach ($categories as $category )
                        <li class="navigation-link text-trueGray-500 hover:bg-Orange-500 hover:text-white ">

                            <a href="" class="py-2 px-4 text-sm flex items-center">
                                <span class="flex justify-center w-9">
                                    {!!$category->icon!!}
                                </span>
                                {{__($category->name)}}
                            </a>

                            <div class="navigation-submenu bg-trueGray-100 absolute w-3/4 h-full top-0 right-0 hidden">
                                <x-navigation-subcategories :category="$category"/>

                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="col-span-3 bg-trueGray-100">
                    <x-navigation-subcategories :category="$categories->first()"/>
                </div>
            </div>
        </div>
    </nav>
</header>
