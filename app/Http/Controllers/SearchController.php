<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public $name = '';

    public function __invoke(Request $request)
    {
        $this->name = $request->name;
        $products = Product::with('images', 'subcategory', 'subcategory.category')->where('name', 'LIKE', '%'.$this->name.'%')
                ->orWhere('description', 'LIKE', '%'.$this->name.'%')
                ->orWhereHas('subcategory', function ($query) {
                    $query->where('name', 'LIKE', '%'.$this->name.'%');
                })
                ->orWhereHas('subcategory.category', function ($query) {
                    $query->where('name', 'LIKE', '%'.$this->name.'%');
                })
                ->where('status', 2)
                ->paginate(10);

        return view('search', compact('products'));
    }
}
