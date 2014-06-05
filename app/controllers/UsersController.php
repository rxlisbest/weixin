<?php

class UsersController extends \BaseController {

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
    }

    public function getIndex()
    {
        return Redirect::to('users/login');
    }

    public function getRegister()
    {
        return View::make('users.register');
    }

    public function getLogin()
    {
        return View::make('users.login');
    }

    public function postLogin()
    {
        if (Auth::attempt(array('username'=>Input::get('username'), 'password'=>Input::get('password')))) {
            return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
        } else {
            return Redirect::to('users/login')
            ->with('message', 'Your username/password combination was incorrect')
            ->withInput();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('users/login')->with('message', 'Your are now logged out!');
    }

    public function getDashboard()
    {
        return View::make('users.index');
    }
}
