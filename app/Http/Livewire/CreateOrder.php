<?php

namespace App\Http\Livewire;

use App\Models\Department;
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
    }

    public function updateEnvioType($value)
    {
        if ($value == 0) {
            $this->resetValidation([
                'department_id', 'city_id', 'district_id', 'address', 'reference',
            ]);
        }
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

        // $order->save();

        // Cart::destroy();
        // return redirect()->route('orders.payment'. $order);
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}
