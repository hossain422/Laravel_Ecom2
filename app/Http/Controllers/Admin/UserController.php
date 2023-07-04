<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index(){
        $user = User::orderBy('id', 'desc')->get();
        return view('admin.all_user', compact('user'));
    }
    public function add_user(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->creator = Auth::user()->id;
        $user->password = Hash::make($request->password_confirmation);
        $user->save();
        return redirect()->back()->with('success', 'User added is Succeccfully!');
    }
    public function edit_user($id){
        $user = User::find($id);
        // $user = User::where('id', $id)->get();
        return view('admin.update_user', compact('user'));
    }
}
