<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;

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
        $motorcycles = Motorcycle::all();

        return view('home', compact('motorcycles'));
    }
}
