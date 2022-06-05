<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
class LoginController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended("/");
        }

        return back()
            ->withErrors([
                "email" => "The provided credentials do not match our records.",
            ])
            ->onlyInput("email");
    }
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }

    public function showForgotPassword()
    {
        return view("auth.email");
    }

    public function doForgotPassword(Request $request)
    {
        $request->validate(["email" => "required|email"]);
        $status = Password::sendResetLink($request->only("email"));
        $res =
            $status === Password::RESET_LINK_SENT
                ? back()->with(["status" => __($status)])
                : back()->withErrors(["email" => __($status)]);

        return $res;
    }
}
