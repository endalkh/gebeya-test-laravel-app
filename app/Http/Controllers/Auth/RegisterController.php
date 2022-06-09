<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view("auth.register");
    }

    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function doSignup(Request $request)
    {
        $credentials = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:4",
            "role" => "required",
        ]);
        

        $data = $request->all();
        if ($data["password"]!=$data["password_confirmation"]){
            return back()->withErrors([
                "password" => "The password is not matched with the confirm.",
            ]);
        }

        $check = $this->create($data);

        return redirect("/")->withSuccess("You have signed-in");
    }
    public function options()
    {
        
        return view("auth.signupCard");
    }


    
    

    protected function create(array $data)
    {
        return User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => Hash::make($data["password"]),
            "role" => $data["role"],
        ]);
    }
}
