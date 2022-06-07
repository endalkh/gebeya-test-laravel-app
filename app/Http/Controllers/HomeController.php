<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categoryLists = Category::where("is_active", true)->get();
        $title = "Home";
        return view("home", compact("categoryLists", "title"));
    }
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect("login");
    }
}
