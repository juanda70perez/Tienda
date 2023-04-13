@props(['product'])
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
                    ${{number_format($product->price,0,".",",")}}
                </div>
                <x-danger-link href="{{route('products.show',$product)}}">
                    {{__('See more')}}
                </x-danger-link>
            </div>

        </div>
    </article>
</li>
