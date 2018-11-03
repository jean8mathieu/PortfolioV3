<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Get the index page info
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(Request $request)
    {
        return view('index', ['page' => 'index']);
    }

    /**
     * Get the About page info
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAbout(Request $request)
    {
        return view('about', ['page' => 'about']);
    }

    public function getContact(Request $request)
    {
        return view('contact', ['page' => 'contact']);
    }

    public function getExample() {
        return view('example');
    }
}
