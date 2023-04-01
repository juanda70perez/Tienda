<div x-data>
    <p class="text-trueGray-700 mb-4">
        <span class="font-semibold">
            {{ __('Available stock') }}: {{ $product->stock }}
        </span>

    </p>
    <div class="flex">
        <div class="mr-4">
            <x-secondary-button disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                wire:target="decrement" wire:click="decrement">
                -
            </x-secondary-button>
            <span class="mx-2 text-trueGray-700">
                {{ $qty }}
            </span>
            <x-secondary-button x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled"
                wire:target="increment" wire:click="increment">
                +
            </x-secondary-button>
        </div>
        <div class="ml-2 flex-1">
            <x-my-button x-bind:disabled="$wire.qty > $wire.quantity" wire:click="$emit('saveProduct',{{$product->id}})"
                 color="Orange" class="w-full">
                {{ __('Add to shopping cart') }}
            </x-my-button>
        </div>
    </div>
    @push('script')
        <script>
            Livewire.on('saveProduct', ProductId => {
                Livewire.emit('addItem');
                Swal.fire({
                    position: 'center',
                    icon: "{{__('success')}}",
                    title: "{{__('Your product has been saved')}}",
                    showConfirmButton: false,
                    timer: 1000
                })
            })
        </script>
    @endpush
</div>
