<div>
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-trueGray-700 uppercase">
                {{ $category->name }}
            </h1>
            {{-- Iconos de visualización --}}
            <div class="grid grid-cols-2 border border-trueGray-200 divide-x divide-trueGray-200 text-trueGray-500">
                <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-Orange-500' : '' }}"
                    wire:click="$set('view','grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-Orange-500' : '' }}"
                    wire:click="$set('view','list')"></i>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        {{-- parte izquierda de subcategorias y filtros --}}
        <aside>

            <h2 class="font-semibold text-center mb-2">
                {{ __('Subcategories') }}
            </h2>
            <ul class="divide-y divide-trueGray-200">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-Orange-500 capitalize {{ $subcategoria == $subcategory->name ? 'text-Orange-500 font-semibold' : '' }}"
                            wire:click="$set('subcategoria','{{ $subcategory->name }}')">
                            {{ $subcategory->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <h2 class="font-semibold text-center mb-2">
                {{ __('Brands') }}
            </h2>
            <ul class="divide-y divide-trueGray-200">
                @foreach ($category->brands as $item)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-Orange-500 capitalize {{ $marca == $item->name ? 'text-Orange-500 font-bold' : '' }}"
                            wire:click="$set('marca','{{ $item->name }}')">
                            {{ $item->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <x-button color class="mt-4" wire:click="clear">
                {{ __('Remove filters') }}
            </x-button>
        </aside>
        <div class="md:col-span-2 lg:col-span-4">
            {{-- Tipo de columnas en productos --}}
            @if ($view == 'grid')
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach ($products as $product)
                        <li class="bg-white rounded-lg shadow">
                            <article>
                                <figure>
                                    <img class="h-48 w-full object-cover object-center" loading="lazy"
                                        src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                </figure>
                                <div class="py-4 px-6">
                                    <h1 class="text-lg font-semibold">
                                        <a href="{{route('products.show',$product)}}">
                                            {{ Str::limit($product->name, 20) }}
                                        </a>
                                    </h1>
                                    <p class="font-bold text-trueGray-700">$ {{ number_format($product->price,0,".",",")}}</p>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            @else
                <ul>
                    @foreach ($products as $product)
                        <x-product-list :product="$product"/>
                    @endforeach
                </ul>
            @endif
                {{--Muestra las paginas de los productos--}}
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
