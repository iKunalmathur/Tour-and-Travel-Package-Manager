<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Category::withTrashed()->restore();
        return view('categories.index', [
            "categories" => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // dd($request->image_local);
        if ($request->hasFile('image_local')) {
            
            $filename = time() . '.' . $request->image_local->getClientOriginalExtension();

            $imagePath = $request->image_local->storeAs('categories_image', $filename, 'public');
            $request["image"] = $imagePath;
        }
        $category = Category::create($request->all());
        return redirect()->route("categories.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if ($request->hasFile('image_local')) {

            if ($category->image) {
                Storage::delete('/public/' . $category->image);
            }
            
            $filename = time() . '.' . $request->image_local->getClientOriginalExtension();

            $imagePath = $request->image_local->storeAs('categories_image', $filename, 'public');

            $request["image"] = $imagePath;
        }
        $category = $category->update($request->except("_token"));
        return redirect()->route("categories.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->packages()->count()) {
            Session::flash('message', 'Invalid Action : This category has a linked packages');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }

        $category->delete();

        return redirect()->route("categories.index");
    }
}
