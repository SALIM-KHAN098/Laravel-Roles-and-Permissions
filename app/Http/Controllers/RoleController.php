<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\roles\CreateRequest;
use App\Http\Requests\Admin\roles\UpdateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class RoleController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return[
            new Middleware('permission:view roles', only: ['index']),
            new Middleware('permission:edit roles', only: ['edit']),
            new Middleware('permission:create roles', only: ['create']),
            new Middleware('permission:delete roles', only: ['destory']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $permission = Permission::all();
        return view('role.index', compact('roles', 'permission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        try {
            if($request !== null){
                $role = Role::create([
                    'name' => $request->name,
                ]);

                if(!empty($request->permission)){
                    foreach($request->permission as $permission){
                        $role->givePermissionTo($permission);
                    }
                }

                return to_route('roles.index')->withStatus('Role has been created successfully');
            }else{
                return to_route('roles.index')->withErrors('Alredy exsits');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $hasPermissions = $role->permissions->pluck('name');
        $permissions = Permission::all();
        return view('role.edit', compact('role', 'permissions', 'hasPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {

        try {
            $role = Role::find($id);
            if(!empty($request)){
                $role->update([
                    'name' => $request->name,
                ]);

                if(!empty($request->permission)){
                    $role->syncPermissions($request->permission);
                }else{
                    $role->syncPermissions([]);
                }

                return to_route('roles.index')->withStatus('Role has been Updated successfully');
            }else{
                return to_route('roles.edit', $id)->withErrors("Please fix the issue");
            }
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        if(!empty($role)){
            $role->delete();
            return redirect()->back()->withStatus('Role is Deleted Successfully');

        }
        return redirect()->back()->withErrors('Role is not found');
    }
}
