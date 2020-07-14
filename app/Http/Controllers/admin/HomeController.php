<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
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
        return view('admin.login');
    }
    
    public function verify()
    {
        return view('admin.layout');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function logout()
    {
        return view('admin.layout');
    }

    public function status($id){
        
    }
}
