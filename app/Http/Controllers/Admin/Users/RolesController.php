<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Bouncer;
use Illuminate\Support\Facades\Auth;
use Silber\Bouncer\Database\Role;

class RolesController extends Controller
{

    public function __construct()
    {
        // $this->middleware(function ($request, $next) {
        //     if (!Auth::user()->hasRolesPrivilages()) {
        //         abort(403);
        //     }
        //     return $next($request);
        // });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('admin-role-list')) {
            abort(403);
        }
        $roles = Bouncer::role()->all();
        return view('admin.users.roles.index')->with(['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('admin-role-add')) {
            abort(403);
        }
        return view('admin.users.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('admin-role-add')) {
            abort(403);
        }
        $request->validate([
            'role_name' => 'required',
        ], [
            'role_name.required' => 'Please enter a role name',
        ]);

        $role = Bouncer::role()->where('name', $request->role_name)->first();
        if ($role !== null && $role->count()) {
            return back()->withErrors(['role_name' => 'Sorry, a role with the same name already exist. Please neter an new name.']);
        }

        $name = clean(strtolower($request->role_name));

        $new_role = Bouncer::role()->firstOrCreate([
            'name' => $name,
            'title' => $request->role_name,
        ]);

        if ($request->ability) {
            foreach ($request->ability as $key => $ability) {
                Bouncer::allow($new_role)->to($key);
            }
        }

        Bouncer::refresh();

        return redirect()->route('admin.roles.index')->with('status', 'New role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        if (!Auth::user()->can('admin-role-view')) {
            abort(403);
        }
        if ($role->name == 'superadmin') {
            abort(403, 'Sorry you cant view or edit super admin role');
        }
        $role->load('abilities');
        $abilities = $role->abilities->pluck('name')->toArray();
        return view('admin.users.roles.show')
            ->with([
                'role' => $role,
                'abilities' => $abilities
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        if (!Auth::user()->can('admin-role-edit')) {
            abort(403);
        }
        if ($role->name == 'superadmin') {
            abort(403, 'Sorry you cant view or edit super admin role');
        }
        $role->load('abilities');
        $abilities = $role->abilities->pluck('name')->toArray();
        return view('admin.users.roles.edit')
            ->with([
                'role' => $role,
                'abilities' => $abilities
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if (!Auth::user()->can('admin-role-edit')) {
            abort(403);
        }
        $request->validate([
            'role_name' => 'required|unique:roles,title,' . $role->id
        ], [
            'role_name.required' => "Please enter role name",
            'role_name.unique' => "Sorry, a role with the same name already exist. Please neter an new name."
        ]);

        $role->update([
            'title' => $request->role_name
        ]);

        if ($request->ability) {
            Bouncer::sync($role)->abilities([]);
            foreach ($request->ability as $key => $ability) {
                Bouncer::allow($role)->to($key);
            }
        }

        Bouncer::refresh();

        return redirect()->route('admin.roles.index')->with('status', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if (!Auth::user()->can('admin-role-delete')) {
            abort(403);
        }
        $users = User::whereIs($role->name)->get();
        foreach ($users  as $user) {
            $user->retract($role->name);
        }
        Bouncer::sync($role)->abilities([]);
        $role->delete();

        Bouncer::refresh();
        return redirect()->route('admin.roles.index')->with('status', 'Role deleted successfully');
    }
}
