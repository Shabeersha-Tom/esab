<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->id !== $request->user()->id) {
                abort(403);
            }
            return $next($request);
        });
    }

    function updatePassword(Request $request)
    {
        $user = Auth()->user();
        $input = $request->all();

        $validator = Validator::make($input, [
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', new Password, 'confirmed'],
        ]);

        $validator->after(function ($validator) use ($user, $input) {
            if (!isset($input['current_password']) || !Hash::check($input['current_password'], $user->password)) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
            }
        });

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();

        return back()->with('status', "Password Updated!");
    }

    function updateProfile(Request $request)
    {

        $user = Auth()->user();
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
        ], [
            'name.require' => "Please enter a name",
            'name.max' => "Name cannot be larger than 255 characters",
            'name.min' => "Name cannot be less than 3 characters",
        ]);
        $user->forceFill([
            'name' => $request->name,
        ])->save();
        return back()->with('status', "Profle Updated!");
    }

    function logoutEverywhere(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string'],
        ], [
            'password.require' => "Please enter your password",
        ]);

        if (!isset($request->password) || !Hash::check($request->password, Auth()->user()->password)) {
            return back()->withErrors(['errors' => "The given password does not match the current password."]);
        }

        Auth::logoutOtherDevices($request->password);
        return back()->with('status', "You are now logged out everywhere else.");
    }
}
