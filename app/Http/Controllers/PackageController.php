<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('packages.index', [
            'packages' => Package::all()->sortByDesc("created_at")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.create', [
            'categories' => Category::all()->sortByDesc("created_at")
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
    {

        // dd($request->all());

        // Adding data to request

        if ($request->has('status')) {
            $request['status'] = ($request->status) ? 1 : 0;
        }

        if ($request->hasFile('image_local')) {

            $filename = time() . '.' . $request->image_local->getClientOriginalExtension();

            $imagePath = $request->image_local->storeAs('packages_image', $filename, 'public');

            $request["image"] = $imagePath;
        }

        // Creating Package
        $package = Package::create($request->except("image_local", "_token"));

        return redirect()->route("packages.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        // dd($package);
        $categories = Category::all()->sortByDesc("created_at");
        return view("packages.edit", compact("package", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(PackageRequest $request, Package $package)
    {
        // dd($request->all());

        // Adding data to request

        $request['status'] = ($request->status) ? 1 : 0;

        if ($request->hasFile('image_local')) {

            if ($package->image) {
                Storage::delete('/public/' . $package->image);
            }

            $filename = time() . '.' . $request->image_local->getClientOriginalExtension();

            $imagePath = $request->image_local->storeAs('packages_image', $filename, 'public');

            $request["image"] = $imagePath;
        }

        // Creating Package
        $package = $package->update($request->except("image_local", "_token"));

        return redirect()->route("packages.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route("packages.index");
    }
}
