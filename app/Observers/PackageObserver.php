<?php

namespace App\Observers;

use App\Models\Package;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PackageObserver
{
    /**
     * Handle the Package "creating" event.
     *
     * @param  \App\Models\Package  $package
     * @return void
     */
    public function creating(Package $package)
    {
        $package->pkg_id = "PKG" . rand(99999, 999999);
        $package->slug = Str::random(10) . "-" . str::slug($package->name);
    }

    /**
     * Handle the Package "created" event.
     *
     * @param  \App\Models\Package  $package
     * @return void
     */
    public function created(Package $package)
    {
        if ($package->exists()) {
            Session::flash('message', 'Package Created Successfuly!');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', 'Error Occured!!');
            Session::flash('alert-class', 'alert-danger');
        }
    }

    /**
     * Handle the Package "updating" event.
     *
     * @param  \App\Models\Package  $package
     * @return void
     */
    public function updating(Package $package)
    {
        if ($package->isDirty("name")) {
            $package->slug = Str::random(10) . "-" . str::slug($package->name);
        }
    }

    /**
     * Handle the Package "updated" event.
     *
     * @param  \App\Models\Package  $package
     * @return void
     */
    public function updated(Package $package)
    {
        if ($package->wasChanged()) {
            Session::flash('message', 'Package Updated Successfuly!');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', 'Error Occured!!');
            Session::flash('alert-class', 'alert-danger');
        }
    }

    /**
     * Handle the Package "deleted" event.
     *
     * @param  \App\Models\Package  $package
     * @return void
     */
    public function deleted(Package $package)
    {
        if ($package->trashed()) {
            Session::flash('message', 'Package Deleted Successfuly!');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', 'Error Occured!!');
            Session::flash('alert-class', 'alert-danger');
        }
    }

    /**
     * Handle the Package "restored" event.
     *
     * @param  \App\Models\Package  $package
     * @return void
     */
    public function restored(Package $package)
    {
        //
    }

    /**
     * Handle the Package "force deleted" event.
     *
     * @param  \App\Models\Package  $package
     * @return void
     */
    public function forceDeleted(Package $package)
    {
        //
    }
}
