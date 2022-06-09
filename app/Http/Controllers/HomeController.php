<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;

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
        $products = Product::where("is_active", true)->get();
        $title = "Home";
        $user = Auth::user();
        if ($user->role == 'user') {
            return view("home", compact("products", "title"));

        }
        else {
            return view("pages.dashboard.dashboard", compact("products", "title"));

        }
    }
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect("login");
    }
}
