<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "message",
        "package_id"
    ];

    protected $hidden = [
        "id"
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
