<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ziadost;

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
        $ziadosti = Ziadost::all();
        return view('home')->with('ziadosti', $ziadosti);
    }
}
