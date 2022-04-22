<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RealEstate;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, "You don't have admin  permission");
        
        $users = User::with('roles')->get();

        return view('users.index', compact('users'));
    }

    

    public function create()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, "You don't have admin  permission");

        $roles = Role::pluck('title', 'id');
        
         return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, "You don't have admin  permission");

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, "You don't have admin  permission");

        $roles = Role::pluck('title', 'id');
        $property_types = RealEstate::$PROPERTY_TYPES;

        $user->load('roles');

        return view('users.edit', compact('user', 'roles'))->with('property_types', $property_types);
    }

    public function update(Request $request, User $user)
    {  
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        $user->interested = $request->get('interested');
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, "You don't have admin  permission");
    
        $user->delete();

        return redirect()->route('users.index');
    }
}
