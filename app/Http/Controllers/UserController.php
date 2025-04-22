<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enum\RolesEnum;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return inertia('Users', [
            'users' => User::with('roles')->get(),
            'roles' => Role::pluck('name') // ['Prof', 'Secretary', 'Director']
        ]);
    }

    public function fetch()
    {
        return response()->json(
            User::with('roles')->get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->roles->pluck('name')->first(), // assumes single role
                ];
            })
        );
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if($request->input('role') === 'prof'){
            $user->assignRole(RolesEnum::Prof);
        } else if($request->input('role') === 'secretary'){
            $user->assignRole(RolesEnum::Secretary);
        } else if($request->input('role') === 'director'){
            $user->assignRole(RolesEnum::Director);
        } else {
            $user->assignRole(NULL);
        }

        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
