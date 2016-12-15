<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tasks = Categories::orderBy('created_at', 'asc')->get();
        return view('home', ['tasks' => $tasks]);
    }
}
