<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display the admin panel
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getIndex(Request $request)
    {
        return view('admin.index');
    }

    /**
     * Display the log in page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getLogin(Request $request)
    {

        if(Auth::check()) {
            return Redirect::to('/admin');
        }

        return view('login');
    }

    /**
     *  Validating the user
     *
     * @param Request $request
     * @return array
     */
    function postValidateUser(Request $request)
    {

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return ['error' => false, 'message' => "You've successfully logged in. You'll be redirected shortly!", 'href' => '/admin'];
        } else {
            return ['error' => true, 'message' => "Please try again..."];
        }
    }

    function getLogout(){
        Auth::logout();
        return Redirect::to('/');
    }

}
