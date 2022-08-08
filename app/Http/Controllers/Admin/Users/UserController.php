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
            if (!Auth::user()->hasUserPrivilages()) {
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
        if (!Auth::user()->can('admin-user-list')) {
            abort(403);
        }
        $users = User::with('roles')->get();
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
        if (!Auth::user()->can('admin-user-add')) {
            abort(403);
        }
        $roles = Bouncer::role()->all();
        return view('admin.users.create')
            ->with([
                'roles' => $roles,
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
        if (!Auth::user()->can('admin-user-add')) {
            abort(403);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status
        ]);

        if ($request->role) {
            $user->assign($request->role);
        }

        Bouncer::refresh();
        return redirect()->route('admin.users.index')->with('status', 'User Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (!Auth::user()->can('admin-user-view')) {
            abort(403);
        }
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
        if (!Auth::user()->can('admin-user-edit')) {
            abort(403);
        }
        $roles = Bouncer::role()->all();
        $userRoles = $user->getRoles()->toArray();
        return view('admin.users.edit')
            ->with([
                'user' => $user,
                'roles' => $roles,
                'userRoles' => $userRoles,
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
        if (!Auth::user()->can('admin-user-edit')) {
            abort(403);
        }
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
        if (!Auth::user()->can('admin-user-delete')) {
            abort(403);
        }
        $user->delete();
        Bouncer::refresh();
        return back()->with('status', 'User has been deleted.');
    }
}
