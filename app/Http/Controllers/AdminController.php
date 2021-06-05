<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;



class AdminController extends Controller
{
    public function index()
    {
        // $users = User::orderBy('id', 'DESC')->get();
        // return view('admin.dashboard', compact('users'));
    }

    public function login()
    {
        return view('auth.adminLogin');
    }
    public function checkAdminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);


        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email'));
    }

    // public function addCategory (Request $request){
    //         $user = new User();
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->password = $request->password;
    //         $user->save();

    //         return response()->json($user);
    // }

    // public function getUserById($id){
    //     $user = User::find($id);
    //     return response()->json($user);
    // }

    // public function updateUser(Request $request){
    //     $user = User::find($request->id);
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->save();
    //     return response()->json($user);
    // }

    public function showAdmin()
    {
       $admins = Admin::orderBy('id')->get();
       dd($admins);
    }
}
