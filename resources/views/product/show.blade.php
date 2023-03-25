<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img src="{{ Storage::url($image->url) }}" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <h1 class="text-xl font-semibold text-trueGray-700">{{ $product->name }}</h1>
                <div class="flex">
                    <p class="text-trueGray-700">
                        {{ __('Brand') }}:
                        <a class="underline capitalize hover:text-Orange-500" href="">
                            {{ $product->brand->name }}
                        </a>
                    <p class="text-trueGray-700 mx-6">
                        5
                        <i class="fas fa-star text-sm text-yellow-400"></i>
                    </p>
                    <a class="text-Orange-500 hover:text-Orange-700 underline" href="">39 {{ __('Reviews') }}</a>
                    </p>
                </div>
                <div>
                    <p class="text-lg font-semibold  tex-bg-trueGray-700 my-4">
                        {{ $product->description }}
                    </p>
                </div>
                <p class="text-2xl font-semibold  text-bg-trueGray-700 my-4">
                    ${{ $product->price }}
                </p>
                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-greenLime-600">
                            <i class="fas fa-truck text-white"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-greenLime-600">
                                {{ __('Free shipping to all Colombia') }}
                            </p>
                        </div>
                    </div>
                </div>
                @if ($product->subcategory->size)
                    @livewire('add-cart-item-size', ['product' => $product])
                @elseif ($product->subcategory->color)
                    @livewire('add-cart-item-color', ['product' => $product])
                @else
                    @livewire('add-cart-item', ['product' => $product])
                @endif
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>


    @endpush
</x-app-layout>
