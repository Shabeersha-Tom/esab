<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Bouncer;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->cannot('manage-users')) {
                abort(403);
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        // dd($users);
        return view('admin.users.index')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Bouncer::role()->all();
        $abilities = Bouncer::ability()->all();
        return view('admin.users.create')
            ->with([
                'roles' => $roles,
                'abilities' => $abilities
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'backend',
            'status' => $request->status
        ]);

        $user->assign($request->role);

        foreach ($request->ability as $ability) {
            $user->allow($ability);
        }

        Bouncer::refresh();

        return redirect()->route('users.index')->with('status', 'User Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show')->with(['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Bouncer::role()->all();
        $abilities = Bouncer::ability()->all();


        $userRoles = $user->getRoles()->toArray();
        $userAbilities = $user->getAbilities()->pluck('id')->toArray();

        return view('admin.users.edit')
            ->with([
                'user' => $user,
                'roles' => $roles,
                'abilities' => $abilities,
                'userRoles' => $userRoles,
                'userAbilities' => $userAbilities,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status
        ]);

        if ($request->password) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        // Delete All roles and assign new ones
        foreach ($user->roles as $roles) {
            $user->retract($roles->name);
        }
        $user->assign($request->role);

        // Delete all abilities and assign new ones
        foreach ($user->abilities as $ability) {
            $user->disallow($ability->name);
        }
        foreach ($request->ability as $ability) {
            $user->allow($ability);
        }

        Bouncer::refresh();

        return back()->with('status', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $users = User::whereIs('superadmin')->count();
        if ($users <= 1) {
            return back()->with('error', 'Sorry the last super admin cannot be deleted.');
        }
        $user->delete();
        return redirect()->route('users.index')->with('status', 'User has been deleted.');
    }
}
