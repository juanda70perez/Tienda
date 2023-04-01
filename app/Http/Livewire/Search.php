<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $search;

    public $open = false;

    public function updatedSearch($value)
    {
        if ($value) {
            $this->open = true;
        } else {
            $this->open = false;
        }
    }

    public function render()
    {
        // $products = Product::with("images")->with(['subcategory' => function ($query) {
        //     $query->orwhere("name","LIKE","%".$this->search."%");
        // }])->with(['subcategory.category' => function ($query) {
        //     $query->orwhere("name","LIKE","%".$this->search."%");
        // }])->orwhere("name","LIKE","%".$this->search."%")->orWhere("description","LIKE","%".$this->search."%")->get();
        if ($this->search) {
            $products = Product::with('images', 'subcategory', 'subcategory.category')->where('name', 'LIKE', '%'.$this->search.'%')
                ->orWhere('description', 'LIKE', '%'.$this->search.'%')
                ->orWhereHas('subcategory', function ($query) {
                    $query->where('name', 'LIKE', '%'.$this->search.'%');
                })
                ->orWhereHas('subcategory.category', function ($query) {
                    $query->where('name', 'LIKE', '%'.$this->search.'%');
                })
                ->where('status', 2)
                ->take(10)
                ->get();
        } else {
            $products = [];
        }

        return view('livewire.search', compact('products'));
    }
}
