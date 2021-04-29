<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function index_all(){
        // retrieves all the list of file profiles to display them
        $listes = Content::All();
        return view('welcome', compact('listes'));
    }
}
