<div class="container py-8">
    <section class="bg-white rounded-lg shadow-lg p-6 text-gray-700">
        <h1 class="text-lg font-semibold text-center mb-4">
            {{ __('Shopping cart') }}
        </h1>
        @if (Cart::count())
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>
                            {{ __('Price') }}
                        </th>
                        <th>
                            {{ __('Mount') }}
                        </th>
                        <th>
                            {{ __('Total') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                        alt="">
                                    <div>
                                        <p class="font-bold">{{ $item->name }}</p>
                                        @if ($item->options->color)
                                            <span>
                                                {{ __('Color') }}: {{ __($item->options->color) }}
                                            </span>
                                        @endif
                                        @if ($item->options->size)
                                            <span class="mx-1">-</span>
                                            <span class="mr-1">
                                                {{ __('Size') }}: {{ __($item->options->size) }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span>${{ number_format($item->price,0,'.',',') }}</span>
                                <a wire:click="delete('{{$item->rowId}}')" wire:loading.class="text-red-600 opacity-25" wire:target="delete('{{$item->rowId}}')" class="ml-6 cursor-pointer hover:text-red-600">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                            <td class="">
                                <div class="flex justify-center">
                                    @if ($item->options->size)
                                        @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))
                                    @elseif($item->options->color)
                                        @livewire('update-cart-item-color', ['rowId' => $item->rowId], key($item->rowId))
                                    @else
                                        @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                    @endif

                                </div>

                            </td>
                            <td class="text-center">
                                ${{ number_format($item->price * $item->qty,0,'.',',') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a class="text-sm cursor-pointer hover:underline mt-3 inline-block" wire:click="destroy">
                <i class="fas fa-trash"></i>
                {{ __('Delete shopping cart') }}
            </a>
        @else
            <div class="flex flex-col items-center">
                <x-cart/>
                <p class="text-lg text-gray-700 mt-4">
                    {{__('Your shopping cart are empty')}}
                </p>
                <x-button-link href="/" class="mt-4 px-16">
                    {{__('Go to home')}}
                </x-button-link>

            </div>
        @endif

    </section>
    @if (Cart::count())
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700">
                        <span class="font-bold text-lg">
                            {{__('Total')}}: ${{ number_format(str_replace(',', '',Cart::subtotal()),0,'.',',')}}
                        </span>
                    </p>
                </div>
                <div>
                    <x-button-link href="{{route('orders.create')}}">
                        {{'Continue'}}
                    </x-button-link>
                </div>
            </div>
        </div>
    @endif
</div>
