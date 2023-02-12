<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
   public function index()
   {
       return view('profile.show');
   }

   public function updateProfile(Request $request, User $user)
   {

   }

   public function updatePassword(Request $request, User $user)
   {
       if (!Hash::check( Hash::make($request->password), $user->password)) {
       return redirect()
           ->back()
           ->withErrors(['password' => 'Incorrect current password.']);
   }
       $request->validate([
           'password'=>'required',
           'newPassword'=>'required|confirmed',
       ]);
       dd($request->all());



       $user->password = Hash::make($request->newPassword);
       $user->save();

       return redirect()
               ->back()
               ->with(['success' => 'Password is updated.']);
   }
}
