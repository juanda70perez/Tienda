<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CategoryProducts extends Component
{
    public $category;

    public $products = [];

    public function loadPosts()
    {
        $this->products = $this->category->products()->where('status', 2)->take(20)->get();
        // $this->products = Product::with('images')->where(
        //     ['status', 2],
        //     ['subcategory',$this->category->id]
        // )->take(20)->get();
        $this->emit('glider', $this->category->id);
    }

    public function render()
    {
        return view('livewire.category-products');
    }
}
