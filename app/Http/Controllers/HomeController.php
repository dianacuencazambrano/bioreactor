<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planta;

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
        $plantas = Planta::all();
        return view('home', ['plantas' => $plantas]);
    }
    public function dashboard()
    {
        $plantas = Planta::all();
        return view('dashboard', ['plantas' => $plantas]);
    }
}
