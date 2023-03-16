<div class="  relative inline-block text-left px-1  md:px-6 ">
    <div>
        <!-- boton afuera -->
        <button type="button" x-on:click="showLanguaje()"
            class="inline-flex w-full justify-center gap-x-1.5 rounded-md  px-3 py-2 text-sm font-semibold text-white "
            id="menu-button" aria-expanded="true" aria-haspopup="true">
            {{ __('Languaje') }}
            <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <!-- contenido  adentro -->
    <div x-show = "openLanguaje"
        class="  bg-white absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">

        <!-- Lista de contenido-->
        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
        <a href="locale/en" class=" hover:bg-trueGray-400  text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
            id="menu-item-0">{{ __('English') }}</a>
        <a href="locale/es" class=" hover:bg-trueGray-400 text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
            id="menu-item-1">{{ __('Spanish') }}</a>

    </div>
</div>
