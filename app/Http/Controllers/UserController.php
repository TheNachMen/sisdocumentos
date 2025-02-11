<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::simplePaginate(10);

        return view("admin.users.index",compact("users"));
    }

    public function edit(User $user){
        $roles = Role::all();
        
        return view("admin.users.edit",compact("user","roles"));
    }

    public function update(Request $request,User $user){

        $user-> roles()->sync( $request->role );

        return redirect()->route("users.edit",$user)
                            ->with("success-update","Rol establecido con éxito");
    }

    public function destroy(User $user){
        $user->delete();

        return redirect()->action([UserController::class,"index"])
                            ->with("success-delete","Usuario Eliminado con Exito");
    }
}
