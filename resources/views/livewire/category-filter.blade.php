<div>
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-trueGray-700 uppercase">
                {{ $category->name }}
            </h1>
            <div class="grid grid-cols-2 border border-trueGray-200 divide-x divide-trueGray-200 text-trueGray-500">
                <i class="fas fa-border-all p-3 cursor-pointer"></i>
                <i class="fas fa-th-list p-3 cursor-pointer"></i>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-5 gap-6">

        <aside>

            <h2 class="font-semibold text-center mb-2">
                {{ __('Subcategories') }}
            </h2>
            <ul class="divide-y divide-trueGray-200">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-Orange-500 capitalize {{$subcategoria == $subcategory->name ? 'text-Orange-500 font-semibold' : ''}}"
                        wire:click="$set('subcategoria','{{$subcategory->name}}')"
                        >
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
                        <a class="cursor-pointer hover:text-Orange-500 capitalize {{ $marca == $item->name ? 'text-Orange-500 font-bold' : ''}}"
                        wire:click="$set('marca','{{$item->name}}')"
                        >
                            {{ $item->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <x-button color class="mt-4" wire:click="clear">
                {{__('Remove filters')}}
            </x-button>
        </aside>
        <div class="col-span-4">
            <ul class="grid grid-cols-4 gap-4">
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
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
