<div>
    <x-dropdown width="96">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <x-cart color="white" size="30" />
                @if (Cart::count())
                    <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full">
                        {{ Cart::count() }}
                    </span>
                @else
                    <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full">

                    </span>
                @endif

            </span>

        </x-slot>
        <x-slot name="content">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex px-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">
                            <h1 class="font-bold">
                                {{ $item->name }}
                            </h1>
                            <div class="flex">
                                <p>
                                    {{ __('Amount') }}: {{ $item->qty }}
                                </p>
                                @isset($item->options['color'])
                                    <p class="mx-2">
                                       {{__('Color')}}: {{__($item->options['color'])}}
                                    </p>
                                @endisset
                            </div>

                            <p>
                                $ {{ $item->price }}
                            </p>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-trueGray-700">
                            {{ __('You not have items') }}
                        </p>
                    </li>
                @endforelse
            </ul>
            @if (Cart::count())
                <div class="py-2 px-3">
                    <p class="text-lg text-trueGray-700 mt-2 mb-3">
                        <span class="font-bold">
                            {{ __('Total') }}
                        </span>: $ {{ Cart::subtotal() }}
                    </p>
                    <x-button-link href="#" color="Orange" class="w-full">
                        {{ __('Go to shopping cart') }}
                    </x-button-link>

                </div>
            @endif
        </x-slot>
    </x-dropdown>
</div>
