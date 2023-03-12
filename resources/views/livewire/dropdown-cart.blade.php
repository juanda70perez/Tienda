<div>
    <x-dropdown width="96">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <x-cart color="white" size="30"/>
                <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full">

                </span>
            </span>

        </x-slot>
        <x-slot name="content">
            <div class="py-6 px-4">
                <p class="text-center text-trueGray-700">
                    {{__('You not have items')}}
                </p>
            </div>
        </x-slot>
    </x-dropdown>
</div>
