<div>
    <div class="flex">
        <div>
            <x-secondary-button wire:click="decrement">
                -
            </x-secondary-button>
            <span class="mx-2 text-trueGray-700">
                {{$qty}}
            </span>
            <x-secondary-button wire:click="increment">
                +
            </x-secondary-button>
        </div>
        <div class="ml-2 flex-1">
            <x-my-button color="Orange" class="w-full">
                {{__('Add to shopping cart')}}
            </x-my-button>
        </div>
    </div>
</div>
