<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        "pkg_id",
        "name",
        "price",
        "slug",
        "duration",
        "overview",
        "includes",
        "excludes",
        "itineraries",
        "image",
        "status",
        "category_id"
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class, 'package_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($package) {
    //         $package->itinerary()->delete();
    //     });
    // }
}
