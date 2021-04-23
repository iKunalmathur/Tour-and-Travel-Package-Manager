<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.show');
    }

    public function update(UpdateProfileRequest $request)
    {
        // dd($request->all());

        $user = User::find(Auth::id());

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->hasFile('avatar')) {

            if ($user->avatar) {
                Storage::delete('/public/'.$user->avatar);
            }

            $filename = time() . '.' . $request->avatar->getClientOriginalExtension();

            $imagePath = $request->avatar->storeAs('users_image', $filename, 'public');

            $user->avatar = $imagePath;

        }
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($user->isDirty()) {
            Session::flash('message', 'Profile Updated Successfuly!'); 
            Session::flash('alert-class','alert-success');
        }
        else  {
            Session::flash('message', 'No Changes Has Been Made!'); 
        }

        $user->save();

        return redirect()->back();

    }
}
