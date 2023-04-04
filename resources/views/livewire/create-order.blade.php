<div class="container py-8 md:grid md:grid-cols-5 gap-6">
    <div class="col-span-3">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <x-label value="{{ __('Name of contact') }}" />
                <x-input name="contact" value="{{old('contact')}}" wire:model.defer="contact" type="text"
                    placeholder="{{ __('Enter the name of the person who will receive the product') }}" class="w-full" />
                <x-input-error for='contact'></x-input-error>
            </div>
            <div>
                <x-label value="{{ __('Contact mobile number') }}" />
                <x-input  name="phone" value="{{old('phone')}}" wire:model.defer="phone" type="text" placeholder="{{ __('Enter a contact mobile number') }}" class="w-full" />
                <x-input-error for='phone'></x-input-error>
            </div>
        </div>
        <div x-data="{envio_type: @entangle('envio_type')}">
            <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">
                {{ __('Shipments') }}
            </p>
            <label class="mb-4 bg-white rounded-lg shadow px-6 py-4 flex items-center">
                <input x-model="envio_type" type="radio" value="0" name="envio_type=0" class="text-gray-600">
                <span class="mx-2 text-gray-700">
                    {{ 'Store Pickup' }}
                </span>
                <span class="font semibold text-gray-700 ml-auto">
                    {{ __('Free') }}
                </span>
            </label>
            <div class="bg-white rounded-lg shadow">
                <label class="px-6 py-4 flex items-center">
                    <input x-model="envio_type" type="radio" value="1" name="envio_type=1" class="text-gray-600">
                    <span class="mx-2 text-gray-700">
                        {{ 'Home deliveries' }}
                    </span>
                    <span class="font semibold text-gray-700 ml-auto">
                        {{ __('Free') }}
                    </span>
                </label>

                <div :class="{'hidden': envio_type != 1}" class="px-6 pb-6 grid grid-cols-2 gap-6 mb-4 hidden">
                    {{-- Departamentos --}}
                    <div>
                        <x-label class="text-lg font-semibold mb-2" value="Departaments">
                        </x-label>
                        <select class="form-control w-full" wire:model="department_id">
                            <option value="" disabled selected>
                                {{__('Select a department')}}
                            </option>
                            @forelse ($departments as $department )
                                <option value="{{$department->id}}">
                                    {{__($department->name)}}
                                </option>
                            @empty
                                <p>
                                    {{__('There is not data')}}
                                </p>
                            @endforelse
                        </select>
                        <x-input-error for="departament_id"></x-input-error>
                    </div>
                    {{-- Cities --}}
                    <div>
                        <x-label class="text-lg font-semibold mb-2" value="cities">
                        </x-label>
                        <select class="form-control w-full" wire:model="city_id">
                            <option value="" disabled selected>
                                {{__('Select a city')}}
                            </option>
                            @forelse ($cities as $city )
                                <option value="{{$city->id}}">
                                    {{__($city->name)}}
                                </option>
                            @empty
                                <p>
                                    {{__('There is not data')}}
                                </p>
                            @endforelse
                        </select>
                        <x-input-error for="city_id"></x-input-error>
                    </div>
                    {{-- districts --}}
                    <div>
                        <x-label class="text-lg font-semibold" value="districts">
                        </x-label>
                        <select class="form-control w-full" wire:model="district_id">
                            <option value="" disabled selected>
                                {{__('Select a district')}}
                            </option>
                            @forelse ($districts as $district )
                                <option value="{{$district->id}}">
                                    {{__($district->name)}}
                                </option>
                            @empty
                                <p>
                                    {{__('There is not data')}}
                                </p>
                            @endforelse
                        </select>
                        <x-input-error for="district_id"></x-input-error>
                    </div>
                    <div>
                        <x-label value="{{__('Address')}}"></x-label>
                        <x-input name="address" value="old('address')" class="w-full" wire:model="address" type="text"></x-input>
                        <x-input-error for="address"></x-input-error>
                    </div>
                    <div class="col-span-2">
                        <x-label value="Referencia"></x-label>
                        <x-input name="references" value="old('references')" class="w-full" wire:model="references" type="text"></x-input>
                        <x-input-error for="references"></x-input-error>
                    </div>
                </div>
            </div>

        </div>



    </div>
    <div class="md:col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex px-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">
                            <h1 class="font-bold">
                                {{ $item->name }}
                            </h1>
                            <div class="flex">
                                <p>
                                    {{ __('Amount') }}: {{ $item->qty }}
                                </p>
                                @isset($item->options['color'])
                                    <p class="mx-2">
                                        {{ __('Color') }}: {{ __($item->options['color']) }}
                                    </p>
                                @endisset
                                @isset($item->options['size'])
                                    <p class="mx-2">
                                        {{ __('Size') }}: {{ __($item->options['size']) }}
                                    </p>
                                @endisset
                            </div>

                            <p>
                                $ {{ $item->price }}
                            </p>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-trueGray-700">
                            {{ __('You not have items') }}
                        </p>
                    </li>
                @endforelse
            </ul>
            <hr class="mt-4 mb-3">
            <div class="text-gray-700">
                <p class="flex justify-between items-center">
                    {{__('Subtotal')}}:
                    <span>
                        ${{Cart::subtotal()}}
                    </span>
                </p>

                <p class="flex justify-between items-center">
                    {{__('Shipment')}}
                    <span class="font-semibold">
                        {{__('Free')}}
                    </span>
                </p>
                <hr class="mt-4 mb-3">
                <p class="flex justify-between items-center font-semibold">
                    <span class="text-lg">
                        {{__('Total')}}:
                    </span>
                    <span>
                        ${{Cart::total()}}
                    </span>
                </p>
            </div>
        </div>
        <hr>
            <p class="text-sm text-gray-700 mt-2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, inventore accusamus nemo magnam nesciunt
                maxime obcaecati quia quam nam, beatae ut ex necessitatibus voluptatibus voluptatem. Reiciendis possimus
                aliquam nesciunt omnis.
                <a href="" class="font-semibold text-Orange-500">
                    {{ __('Privacy Policy') }}
                </a>
            </p>
            <div>
                <x-button wire:loading.attr="disabled" wire:target="create_order" wire:click="create_order" class="mt-6 mb-4 justify-center">
                    {{ __('Continue shopping') }}
                </x-button>

            </div>
    </div>
</div>
