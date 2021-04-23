<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Package;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'total_packages' => Package::all()->count(),
            'total_categories' => Category::all()->count(),
            'total_enquiries' => Enquiry::all()->count(),
            'enquiries' => Enquiry::orderBy('id', 'desc')->take(4)->get(),
        ]);
    }
}
