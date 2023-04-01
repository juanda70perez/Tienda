@props(['category'])
<div class="grid grid-cols-4 p-4">
    <div>
        <p class="text-lg font-bold text-center text-trueGray-500 mb-3">{{ __('Subcategories') }}</p>
        <ul>
            @foreach ($category->subcategories as $subcategory)
                <li>
                    <a href="{{route('categories.show', $category) . '?subcategoria=' . $subcategory->slug}}"
                        class="text-trueGray-500 inline-block font-semibold py-1 px-4 hover:text-Orange-500">
                        {{ __($subcategory->name) }}
                    </a>
                </li>
                <div class="navigation-submenu bg-gray-100 absolute w-3/4 h-full top-0 right-0 hidden">


                </div>
            @endforeach
        </ul>
    </div>
    <div class="col-span-3">
        <img class="h-64 w-full object-cover object-center" src="{{ Storage::url($category->image) }}"
            alt="">
    </div>
</div>
