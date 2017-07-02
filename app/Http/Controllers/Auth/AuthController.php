<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Session;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = "/realty";
    protected $loginPath = "/auth";
    protected $redirectAfterLogout  ="/realty";
    protected $redirectTo = '/';
    protected $timeout = 1200;

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
         if(Session::has('id')){
            $this->redirectPath = "/realty/".Session::get('id')."?get_comment=t"; 
        }
        else if (Session::has('friend_id')) {
            
            $this->redirectPath = "/chat/index/".Session::get('friend_id');
        }

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed|regex:/^(?=\S*[a-zA-Z])(?=\S*[\d])\S*$/'
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
