<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function index()
   {
       return view('profile.show');
   }

   public function updateProfile(Request $request)
   {
       $user = Auth::user();
        if($request->input('email') === $user->email )
            $validate = $request->validate([
                'name' => 'required|min:3',
                'email'=>'required|email'
            ]);
        else
           $validate = $request->validate([
               'name' => 'required|min:3',
               'email'=>'required|email|unique:users'
           ]);

        $user->name = $validate['name'];
        $user->email = $validate['email'];

        $user->save();

        return redirect()
                ->back()
                ->with(['success', 'Your information is updated']);
   }

   public function updatePassword(Request $request )
   {

       $request->validate([
           'password'=>'required',
           'newPassword'=>'required',
           'password_confirmation'=>'required|same:newPassword',
       ]);

       $user = Auth::user();

       if (!Hash::check( request()->input('password'), $user->password)) {
           return redirect()
                   ->back()
                   ->withErrors(['password' => 'Incorrect current password.']);
       }

       $user->password = Hash::make($request->newPassword);
       $user->save();

       return redirect()
               ->back()
               ->with(['success' => 'Password is updated.']);
   }
}
