<?php

namespace App\Http\Controllers;


use App\Http\Requests\Admin\permissions\CreateRequest;
use App\Http\Requests\Admin\permissions\UpdateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PermissionController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return[
            new Middleware('permission:view permissions', only: ['index']),
            new Middleware('permission:edit permissions', only: ['edit']),
            new Middleware('permission:create permissions', only: ['create']),
            new Middleware('permission:delete permissions', only: ['destory']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = ModelsPermission::orderBy('name','ASC')->get();
        return view('permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {

        try {
            if($request !== null){
                ModelsPermission::create([
                    'name' => $request->name
                ]);
            }else{
                return redirect()->back()->withInput()->withErrors('The Already Exists '.  $request->name);
            }
            return to_route('permissions.index')->withStatus('The Permission has been Created');
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
    public function edit(string $id)
    {
        $permission = ModelsPermission::find($id);
        return view('permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, ModelsPermission $permission)
    {
        try {

            $permission->update([
                    'name' => $request->name
                ]);

            return to_route('permissions.index')->withStatus('The Permission has been Updated');
        } catch (\Exception $ex) {
            return redirect()->back()->with($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = ModelsPermission::find($id);

        if($permission == null){

            return redirect()->back()->withErrors("Permission has been not found..");
        }
        $permission->delete();
        return redirect()->back()->withStatus('Permission has been Deleted Successfully');
    }
}
