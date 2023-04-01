<x-app-layout>
    <div class="container">
        <ul>
            @forelse ($products as $product)
              <x-product-list :product="$product"/>

            @empty
                <li class="bg-white rounded-lg shadow-2xl">
                    <div class="p-4">
                        <p class="text-lg font-semibold text-gray">
                            {{__('Product not found')}}
                        </p>
                    </div>

                </li>
            @endforelse
        </ul>
        <div class="mt-4">
            {{$products->links()}}
        </div>
    </div>
</x-app-layout>
