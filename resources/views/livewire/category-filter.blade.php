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
                                    <img class="h-48 w-full object-cover object-center"
                                        src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                </figure>
                                <div class="py-4 px-6">
                                    <h1 class="text-lg font-semibold">
                                        <a href="#">
                                            {{ Str::limit($product->name, 20) }}
                                        </a>
                                    </h1>
                                    <p class="font-bold text-trueGray-700">$ {{ $product->price }}</p>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            @else
                <ul>
                    @foreach ($products as $product)
                        <li class="bg-white rounded-lg shadow mb-4">
                            <article class="flex">
                                <figure>
                                    <img class="h-full w-56 object-cover object-center"
                                    src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                </figure>
                                <div class="flex-1 py-4 px-6">
                                    {{--div alineados entre si --}}
                                    <div class="flex justify-between">
                                        <div>
                                            <h1 class=" text-sm lg:text-lg font-semibold text-trueGray-700">
                                                {{$product->name}}
                                            </h1>
                                        </div>
                                        <div class="flex items-center">
                                                <ul class="flext text-sm">
                                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                    <span class="text-trueGray-700 text-sm">(24)</span>
                                                </ul>
                                        </div>
                                    </div>
                                    <div class=" text-xs mt-6 lg:hidden">
                                         <p>{{Str::limit($product->description,100)}}</p>

                                    </div>
                                    <div class=" text-base mt-6 hidden lg:block">
                                        <p>{{Str::limit($product->description,250)}}</p>
                                   </div>
                                    <div class="flex justify-between py-4 px-6  ">
                                        <div class=" text-center text-lg mx-3">
                                            ${{$product->price}}
                                        </div>
                                        <x-danger-button>
                                            {{__('See more')}}
                                        </x-danger-button>
                                    </div>

                                </div>
                            </article>
                        </li>
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
