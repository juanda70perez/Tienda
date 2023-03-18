<?php

namespace App\Http\Controllers;

use App\Models\BrandCategory;
use Illuminate\Http\Request;

/**
 * Class BrandCategoryController
 */
class BrandCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brandCategories = BrandCategory::paginate();

        return view('brand-category.index', compact('brandCategories'))
            ->with('i', (request()->input('page', 1) - 1) * $brandCategories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brandCategory = new BrandCategory();

        return view('brand-category.create', compact('brandCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BrandCategory::$rules);

        $brandCategory = BrandCategory::create($request->all());

        return redirect()->route('brand-categories.index')
            ->with('success', 'BrandCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brandCategory = BrandCategory::find($id);

        return view('brand-category.show', compact('brandCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brandCategory = BrandCategory::find($id);

        return view('brand-category.edit', compact('brandCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrandCategory $brandCategory)
    {
        request()->validate(BrandCategory::$rules);

        $brandCategory->update($request->all());

        return redirect()->route('brand-categories.index')
            ->with('success', 'BrandCategory updated successfully');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $brandCategory = BrandCategory::find($id)->delete();

        return redirect()->route('brand-categories.index')
            ->with('success', 'BrandCategory deleted successfully');
    }
}
