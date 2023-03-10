<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

/**
 * Class SubcategoryController
 * @package App\Http\Controllers
 */
class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::paginate();

        return view('subcategory.index', compact('subcategories'))
            ->with('i', (request()->input('page', 1) - 1) * $subcategories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategory = new Subcategory();
        return view('subcategory.create', compact('subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Subcategory::$rules);

        $subcategory = Subcategory::create($request->all());

        return redirect()->route('subcategories.index')
            ->with('success', 'Subcategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategory = Subcategory::find($id);

        return view('subcategory.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);

        return view('subcategory.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        request()->validate(Subcategory::$rules);

        $subcategory->update($request->all());

        return redirect()->route('subcategories.index')
            ->with('success', 'Subcategory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id)->delete();

        return redirect()->route('subcategories.index')
            ->with('success', 'Subcategory deleted successfully');
    }
}
