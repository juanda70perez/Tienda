<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

/**
 * Class SizeController
 * @package App\Http\Controllers
 */
class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::paginate();

        return view('size.index', compact('sizes'))
            ->with('i', (request()->input('page', 1) - 1) * $sizes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $size = new Size();
        return view('size.create', compact('size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Size::$rules);

        $size = Size::create($request->all());

        return redirect()->route('sizes.index')
            ->with('success', 'Size created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $size = Size::find($id);

        return view('size.show', compact('size'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size = Size::find($id);

        return view('size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Size $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        request()->validate(Size::$rules);

        $size->update($request->all());

        return redirect()->route('sizes.index')
            ->with('success', 'Size updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $size = Size::find($id)->delete();

        return redirect()->route('sizes.index')
            ->with('success', 'Size deleted successfully');
    }
}
