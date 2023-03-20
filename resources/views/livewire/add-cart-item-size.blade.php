<div x-data>
    <div>
        <p class="text-xl text-gray-700">
            {{__('Sizes')}}
        </p>
        <select wire:model="size_id" class="form-control w-full"  >
            <option value="" selected disabled>
                {{__('Select a size')}}
            </option>


            @foreach ($sizes as $size)
                <option value="{{$size->id}}">
                    {{$size->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mt-2">
        <p class="text-xl text-gray-700">
            {{__('Colors')}}
        </p>
        <select  wire:model="color_id" class="form-control w-full"  >
            <option value="" selected disabled>
                {{__('Select a color')}}
            </option>


            @foreach ($colors as $color)
                <option class="capitalize" value="{{$color->id}}">
                    {{__($color->name)}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="flex mt-4">
        <div class="mr-4">
            <x-secondary-button disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                wire:target="decrement" wire:click="decrement">
                -
            </x-secondary-button>
            <span class="mx-2 text-trueGray-700">
                {{ $qty }}
            </span>
            <x-secondary-button x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled"
            wire:target="increment"  wire:click="increment">
                +

            </x-secondary-button>
        </div>

        <div class="ml-2 flex-1">
            <x-my-button
                x-bind:disabled="!$wire.quantity"
                color="Orange"
                class="w-full">
                {{ __('Add to shopping cart') }}
            </x-my-button>
        </div>
    </div>
</div>
