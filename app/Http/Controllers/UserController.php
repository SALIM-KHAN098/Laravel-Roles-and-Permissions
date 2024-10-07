<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return[
            new Middleware('permission:view users', only: ['index']),
            new Middleware('permission:edit users', only: ['edit']),
            // new Middleware('permission.create permissions', only: ['create']),
            // new Middleware('permission.delete permissions', only: ['destory']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('user.create', compact('roles', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
       try {
            if(!empty($request)){
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                $user->syncRoles($request->role);
                return to_route('users.index')->withStatus($request->name." Has been created Successfully");
            }
       } catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
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
    public function edit(string $id)
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        $user = User::find($id);
        $hasRoles = $user->roles->pluck('id');
        return view('user.edit', compact('user', 'roles', 'hasRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            $user =  User::find($id);
            if(!empty($request)){
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
                $user->syncRoles($request->role);
                return to_route('users.index')->withStatus("The ".$user->name." has been updated");
            }else{
                return redirect()->back()->withErrors($request);
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
        $user = User::find($id);
        if(!empty($user)){
            $user->delete();
            return redirect()->back()->withStatus("The $user->name has been delete successfully");
        }else{
            return redirect()->back()->withErrors("The $user->name Not found!!");
        }
    }
}
