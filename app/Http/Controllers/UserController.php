<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Phone;
use Auth;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{
    public function index()
    {
        $users =User::orderBy('id', 'DESC')->get();
        return view('admin.user.show', compact('users'));
    }

    public function addUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $image = $request->file('image');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/user'), $new_name);
        $user->image = $new_name;
        $user->save();
        return response()->json($user);
    }

    public function updateUser(Request $request)
    {

        $user = User::find($request->idUser);
        $path = public_path('images'. $user->imageUser);

        if(File::exists($path) && $request->file('imageUser') ) {
            File::delete($path);
            $userimage = $request->file('imageUser');
            $userimageName = rand() . '.' . $userimage->getClientOriginalExtension();
            $userimage->move(public_path('images/user'), $userimageName);
            $user->image = $userimageName;
        }
    

        $user->name = $request->nameUser;
        $user->email = $request->emailUser;
        $user->save();
        return response()->json($user);
    }

    public function getUserById($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function destroy($id){
            $user = User::find($id);
            $user->delete();
            $path = public_path('images/user'. $user->imageUser);
            if(File::exists($path) && $user->imageUser ) {
                File::delete($path);
            }

            return response()->json(['success' =>'User Deleted Successfully']);
    }
}
