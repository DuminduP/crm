<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Validation\ValidationException;


class ChangePasswordController extends Controller
{
    /**
     * Display change password form
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('auth.change-password');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
          ]);
  
          $user = Auth::user();
  
          if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages(['current_password' => 'Current password is invalid!']);
          }
  
          $user->password = Hash::make($request->password);
          $user->save();
  
        return redirect(RouteServiceProvider::HOME)->with('status', 'Password successfully changed!');;
    }

}
