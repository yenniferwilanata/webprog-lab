<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    public function settings()
    {
        $user = auth()->user();
        return view('settings', compact('user'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|between:5,50',
            'email' => 'nullable|email|ends_with:@gmail.com',
            'phone' => 'nullable|digits:12',
            'address' => 'nullable|min:5',
            'picture' => 'mimes:jpeg,png,jpg',
            'new_password' => 'nullable|between:5,255',
            'confirm_password' => 'nullable|between:5,255|same:newpassword',
            'current_password' => 'required',
        ]);

        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password))
            abort(403);

        if (isset($request->picture))
        {
            $filename = time() . "_" . $request->file('picture')->getClientOriginalName();
            $request->file('picture')->storeAs('/assets/profiles/', $filename, 'public');
            $user->picture = $filename;
        }

        $user->name = $request->name;
        if (isset($request->email))
            $user->email = $request->email;
        if (isset($request->phone))
            $user->phone_number = $request->phone;
        if (isset($request->address))
            $user->address = $request->address;
        if (isset($request->newpassword))
            $user->password = $request->newpassword;
        $user->save();
        $success = true;
        return view('settings', compact('user', 'success'));
    }
}
