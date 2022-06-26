<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Session;

class UserController extends Controller
{
    public function getSignup()
    {
      return view('user.signup');
    }
    public function postSignup(Request $request)
    {
      $this->validate($request, [
        'email' => 'email|required|unique:users',
        'password' => 'password|min:4'
      ]);

      $user = new User([
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'name' => $request->input('name')
      ]);
      $user->save();

      Auth::login($user);
      return redirect()->route('user.profile');
    }

    public function getSignin()
    {
      return view('user.signin');
    }

    public function postSignin(Request $request)
    {
      $this->validate($request, [
        'email' => 'email|required',
        'password' => 'password|min:4'
      ]);

      if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
        return redirect()->route('user.profile');
      }
      return redirect()->route('user.signin')->with('error', 'Wrong password or e-mail address!');
    }

    public function getProfile()
    {
      $orders = Auth::user()->orders;
      $orders->transform(function($order, $key){
      $order->cart = unserialize($order->cart);
      return $order;
      });
      return view('user.profile', ['orders' => $orders]);
    }
    public function getLogout()
    {
      Auth::logout();
      Session::flush();
      return redirect()->route('product.index');
    }
}
