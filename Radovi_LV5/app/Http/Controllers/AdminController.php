<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function showUsers()
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(403);
        }

        $users=User::all();
        return view('admin.users',compact('users'));
    }

    public function assignRole(Request $request, $id)
    {
        if(!Gate::allows('isAdmin'))
        {
            abort(403);
        }

        $users=User::findOrFail($id);

        $request->validate(['role'=>'required|in:admin,nastavnik,student']);

        $users->role=$request->role;
        $users->save();

        return redirect()->route('admin.users')->with('success','Uloga korisnika promjenjna');
    }
}
