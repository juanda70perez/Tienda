<?php

namespace App\Http\Controllers;

use App\Models\ColorProduct;
use Illuminate\Http\Request;

/**
 * Class ColorProductController
 * @package App\Http\Controllers
 */
class ColorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colorProducts = ColorProduct::paginate();

        return view('color-product.index', compact('colorProducts'))
            ->with('i', (request()->input('page', 1) - 1) * $colorProducts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colorProduct = new ColorProduct();
        return view('color-product.create', compact('colorProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ColorProduct::$rules);

        $colorProduct = ColorProduct::create($request->all());

        return redirect()->route('color-products.index')
            ->with('success', 'ColorProduct created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $colorProduct = ColorProduct::find($id);

        return view('color-product.show', compact('colorProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colorProduct = ColorProduct::find($id);

        return view('color-product.edit', compact('colorProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ColorProduct $colorProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ColorProduct $colorProduct)
    {
        request()->validate(ColorProduct::$rules);

        $colorProduct->update($request->all());

        return redirect()->route('color-products.index')
            ->with('success', 'ColorProduct updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $colorProduct = ColorProduct::find($id)->delete();

        return redirect()->route('color-products.index')
            ->with('success', 'ColorProduct deleted successfully');
    }
}
