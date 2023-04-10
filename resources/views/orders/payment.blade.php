<x-app-layout>
    <div class="container py-8">
        <div class="bg white rounded-lg shadow-lg px-6 py-4 mb-6">
            <p class="text-gray-700 uppercase">
                <span class="font-semibold">
                    {{__('Orden number')}}-{{$order->id}}
                </span>
            </p>
        </div>
        <div class="bg white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <p class="text-lg font-semibold uppercase">
                        {{__('Shipment')}}
                    </p>
                    @if ($order->envio_type == 1)
                        <p class="text-sm">
                            {{__('The products will be sent to')}}:
                        </p>
                        <p class="text-sm">
                            {{$order->address}}
                        </p>
                        <p>
                            {{$order->department->name}} - {{$order->city->name}} - {{$order->district->name}}
                        </p>
                    @else
                        <p class="text-sm">
                            {{__('Products will be picked up at the store')}}
                        </p>
                        <p class=""></p>
                    @endif
                </div>
                <div>
                    <p class="text-lg font-semibold uppercase">
                        {{__('Contact details')}}
                    </p>
                    <p class="text-sm">
                        {{__('Person who receives')}}: {{$order->contact}}
                    </p>
                    <p class="text-sm">
                        {{__('Contact mobile number')}}: {{$order->phone}}
                    </p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadown-lg p-6 text-gray-700">
            <p class="text-xl font-semibold mb-4">
                {{__('Resume')}}
            </p>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>{{__('Price')}}</th>
                        <th>{{__('Amount')}}</th>
                        <th>{{__('Total')}}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($items as $item)
                        <tr>
                            <td><div class="flex">
                                <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">
                                <article>
                                    <h1 class="font-bold">
                                        {{$item->name}}
                                    </h1>
                                    <div class="flex text-xs">
                                        @isset($item->options->color)
                                            {{__('Color')}}: {{__($item->options->color)}}
                                        @endisset

                                        @isset($item->options->size)
                                            - {{$item->options->size}}
                                        @endisset
                                    </div>
                                </article>

                            </div>
                        </td>
                        <td class="text-center">
                            ${{$item->price}}
                        </td>
                        <td class="text-center">
                            {{$item->qty}}
                        </td>
                        <td class="text-center">
                            ${{$item->price * $item->qty}}
                        </td>

                    @empty
                        <p class="text-sm">
                            {{__('No data')}}
                        </p>
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="bg-white rounded-lg shadown-lg p-6 flex  justify-between items-center">
            <img class="h-8" src="{{asset('img/MC_VI_DI_2-1.jpg')}}" alt="">
            <div class="textks-gray-700">
                <p class="text-sm font-semibold">
                    {{__('Subtotal')}}: ${{$order->total-$order->shipping_cost}}
                </p>
                <p class="text-sm font-semibold uppercase">
                    {{__('Shippment')}}: ${{$order->shipping_cost}}
                </p>
                <p class="text-lg font-semibold uppercase">
                    {{__('Pago')}}: ${{$order->total}}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
