<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the Category "creating" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function creating(Category $category)
    {
        $category->slug = Str::random(10) . "-" . Str::slug($category->name);
    }

    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {

        if ($category->exists()) {
            Session::flash('message', 'Category Created Successfuly!');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', 'Error Occured!!');
            Session::flash('alert-class', 'alert-danger');
        }
    }

    /**
     * Handle the Category "updating" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updating(Category $category)
    {
        if ($category->isDirty("name")) {
            $category->slug = Str::random(10) . "-" . Str::slug($category->name);
        }
    }

    /**
     * Handle the Category "updated" event. 
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        if ($category->wasChanged()) {
            Session::flash('message', 'Category Updated Successfuly!');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', 'Error Occured!!');
            Session::flash('alert-class', 'alert-danger');
        }
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {

        if ($category->trashed()) {
            Session::flash('message', 'Category Deleted Successfuly!');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', 'Error Occured!!');
            Session::flash('alert-class', 'alert-danger');
        }
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
