<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $auth = Auth::user();

        if (!$auth->is_admin) {
            return redirect("/");
        }

        $users = User::where("id", "!=", $auth->id)->get();
        $title = count($users) > 0 ? "User List" : "No Data is available!";

        return view("pages.user.index", compact("users", "title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth = Auth::user();
        if (!$auth->is_admin) {
            return redirect("/");
        }
        $title = "Add User";
        return view("pages.user.create", compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auth = Auth::user();
        if (!$auth->is_admin) {
            return redirect("/");
        }
        $credentials = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:4",
        ]);
        $data = $request->only(
            "name",
            "email",
            "password",
            "is_admin",
            "is_active"
        );
        if (!$request->has("is_admin")) {
            $data["is_admin"] = 0;
        }

        $check = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "is_admin" => $data["is_admin"],
            "password" => Hash::make($data["password"]),
        ]);

        return redirect()
            ->back()
            ->with(
                "success",
                "Congratutations!.Ideally Password should be auto generated and sent to users Email"
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $title = "User Detail";
        return view("pages.user.update", compact("user", "title"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = collect($request->all())
            ->filter(function ($element, $key) {
                return $element !== null;
            })
            ->toArray();
        if (!$request->has("is_admin")) {
            $data["is_admin"] = false;
        }
        if (!$request->has("is_active")) {
            $data["is_active"] = false;
        }
        $user->fill($data)->save();
        return redirect()
            ->back()
            ->with("success", "Your data updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $auth = Auth::user();

        if (!$auth->is_admin) {
            return redirect("/");
        }
        $user->delete();
        return redirect()
            ->back()
            ->with("success", "Your data deleted successfully!");
    }
}
