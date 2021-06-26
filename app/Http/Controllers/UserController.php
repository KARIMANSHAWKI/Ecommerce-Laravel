<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Phone;
use Auth;
use Illuminate\Support\Facades\File;
use  App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Validator;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $users =User::orderBy('id', 'DESC')->get();
        return view('admin.user.show', compact('users'));
    }


    public function addUser(Request $request)
    {
        $rules = $this->getRules();
        $messages = $this->getMessage();

        $validator = Validator::make($request->all(), $rules, $messages);
        if (!$validator->passes()) {
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
    
            $image = $request->file('image');
            $new_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/user'), $new_name);
            $user->image = $new_name;
            $user->save();
            return response()->json(['data'=> $user, 'status' =>1]);
        }
    }




    public function updateUser(Request $request)
    {
        $user = User::find($request->idUser);
        $path = public_path('images'. $user->imageUser);

        if (File::exists($path) && $request->file('imageUser')) {
            File::delete($path);
            $userimage = $request->file('imageUser');
            $userimageName = rand() . '.' . $userimage->getClientOriginalExtension();
            $userimage->move(public_path('images/user'), $userimageName);
            $user->image = $userimageName;
        }
        $user->name = $request->nameUser;
        $user->email = $request->emailUser;

        $rules = $this->getRulesUpdate();
        $messages = $this->getMessage();

        $userdata =  $this->listUserData($user);
        $validator = Validator::make($userdata, $rules, $messages);
        if (!$validator->passes()) {
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $user->save();
            return response()->json(['data' => $user, 'status' => 1]);
        }
    }

    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $path = public_path('images/user'. $user->imageUser);
        if (File::exists($path) && $user->imageUser) {
            File::delete($path);
        }

        return response()->json(['success' =>'User Deleted Successfully']);
    }


// **************************** Helper Functions ***********************

    //  this for get specific user in update form 
    public function getUserById($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    // this for list rules when create new user
    protected function getRules()
    {
        return $rules = [
                'email' => 'required|email',
                'password' => 'required',
                'name' => 'required| min:5',
                'image' => 'required'
            ];
    }

    //  this for list rules when update  user 
    protected function getRulesUpdate()
    {
        return $rules = [
                'email' => 'required|email',
                'name' => 'required| min:5',
                'image' => 'required'
            ];
    }

    // this for list messages for validation
    protected function getMessage()
    {
        return $messages = [
            'name.required' => 'Name Is Required',
            'email.min' => 'Name Must Be At Least 5 Char',
            'image.required' => 'Image Is Required',
            'email.required' => 'Email Is Required',
            'email.email' => 'Invalid Email.',
            'password.required' => 'Password Is Required'
        ];
    }

    // this to convert user object to array
    protected function listUserData($user)
    {
        return $userData = [
            'name' => $user->name,
            'email' => $user->email,
            'image' => $user->image
        ];
    }

    public function logout() { 
        Session::flush();
         return redirect()->route('site.index'); }
}
