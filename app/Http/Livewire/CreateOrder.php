<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Department;
use App\Models\District;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CreateOrder extends Component
{
    public $departments = [];

    public $cities = [];

    public $districts = [];

    public $department_id = '';

    public $city_id = '';

    public $district_id = '';

    public $address;

    public $contact;

    public $phone;

    public $references;

    public $shipping_cost = 0;

    public $envio_type = 0;

    public $rules = [
        'contact' => 'required',
        'phone' => 'required',
        'envio_type' => 'required',
    ];

    public function mount()
    {
        $this->departments = Department::all();
        if (old('department_id')) {
            $this->department_id = old('department_id');
        }
        if (old('city_id')) {
            $this->city_id = old('city_id');
        }
        if (old('district_id')) {
            $this->district_id = old('district_id');
        }
        if (old('address')) {
            $this->address = old('address');
        }
        if (old('contact')) {
            $this->contact = old('contact');
        }
        if (old('phone')) {
            $this->phone = old('phone');
        }
        if (old('references')) {
            $this->phone = old('references');
        }
        if (old('envio_type')) {
            $this->phone = old('envio_type');
        }
    }

    public function updateEnvioType($value)
    {
        if ($value == 0) {
            $this->resetValidation([
                'department_id', 'city_id', 'district_id', 'address', 'reference',
            ]);
        }
    }

    public function updatedCityId($value)
    {
        $city = City::find($value);
        $this->shipping_cost = $city->cost;
        $this->districts = District::where('city_id', $value)->get();
        $this->reset('district_id');
    }

    public function updatedDepartmentId($value)
    {
        $this->cities = City::where('department_id', $value)->get();
        $this->reset(['district_id', 'city_id']);
    }

    public function create_order()
    {
        $rules = $this->rules;

        if ($this->envio_type == 1) {
            $rules['department_id'] = 'required';
            $rules['city_id'] = 'required';
            $rules['district_id'] = 'required';
            $rules['address'] = 'required';
            $rules['references'] = 'required';
        }

        $this->validate($rules);

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->contact = $this->contact;
        $order->phone = $this->phone;
        $order->envio_type = $this->envio_type;
        $order->shipping_cost = 0;
        $order->total = $this->shipping_cost + Cart::subtotal();
        $order->content = Cart::content();
        if ($this->envio_type == 1) {
            $order->shipping_cost = $this->shipping_cost;
            $order->department_id = $this->department_id;
            $order->city_id = $this->city_id;
            $order->district_id = $this->district_id;
            $order->address = $this->address;
            $order->reference = $this->references;
            // $order->envio = json_encode([
            //     'department' => Department::find($this->department_id)->name,
            //     'city' => City::find($this->city_id)->name,
            //     'district' => City::find($this->district_id)->name,
            //     'address' => $this->address,
            //     'references' => $this->references
            // ]);
        }
        $order->save();

        Cart::destroy();

        return redirect()->route('orders.payment', $order);
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}
