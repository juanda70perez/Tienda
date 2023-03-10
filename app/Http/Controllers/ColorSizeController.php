<?php

namespace App\Http\Controllers;

use App\Models\ColorSize;
use Illuminate\Http\Request;

/**
 * Class ColorSizeController
 * @package App\Http\Controllers
 */
class ColorSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colorSizes = ColorSize::paginate();

        return view('color-size.index', compact('colorSizes'))
            ->with('i', (request()->input('page', 1) - 1) * $colorSizes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colorSize = new ColorSize();
        return view('color-size.create', compact('colorSize'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ColorSize::$rules);

        $colorSize = ColorSize::create($request->all());

        return redirect()->route('color-sizes.index')
            ->with('success', 'ColorSize created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $colorSize = ColorSize::find($id);

        return view('color-size.show', compact('colorSize'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colorSize = ColorSize::find($id);

        return view('color-size.edit', compact('colorSize'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ColorSize $colorSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ColorSize $colorSize)
    {
        request()->validate(ColorSize::$rules);

        $colorSize->update($request->all());

        return redirect()->route('color-sizes.index')
            ->with('success', 'ColorSize updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $colorSize = ColorSize::find($id)->delete();

        return redirect()->route('color-sizes.index')
            ->with('success', 'ColorSize deleted successfully');
    }
}
