<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();
        if (!$user->role) {
            return redirect("/");
        }
        $categories = Category::all();

        if ($user->role == true) {
            $stores = Store::with("owner")->get();
        } else {
            $stores = Store::with("owner")
                ->where("user_id", $user->id)
                ->get();
        }

        $title = count($stores) > 0 ? "Store List" : "No Data is available!";
        return view(
            "pages.store.index",
            compact("categories", "stores", "title")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if (!$user->role) {
            return redirect("/");
        }
        $categories = Category::all();
        $users = User::where("role", "client")->get();
        $title = "Add Store";
        return view(
            "pages.store.create",
            compact("categories", "title", "users")
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->role!='admin') {
            return redirect("/");
        }
        $credentials = $request->validate([
            "name" => "required|unique:stores",
            "user_id" => "required",
        ]);
        $data = $request->only("name", "user_id");

        if (Store::where("user_id", $data["user_id"])->exists()) {
            return back()->withErrors([
                "user_id" => "The user has already a store.",
            ]);
        }
        $created = Store::create($data);


        return redirect()
            ->back()
            ->with("success", "You data added successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        $title = "Store List";
        $users = User::where("role", false)->get();
        return view("pages.store.update", compact("store", "users", "title"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Store $store)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $data = collect($request->all())
            ->filter(function ($element, $key) {
                return $element !== null;
            })
            ->toArray();
        if (!$request->has("is_active")) {
            $data["is_active"] = false;
        }
        $store->fill($data)->save();

        return redirect()
            ->back()
            ->with("success", "Your data updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $user = Auth::user();
        if ($user->role!='admin') {
            return redirect("/");
        }
        $store->delete();

        return redirect()
            ->back()
            ->with("success", "Your data deleted successfully!");
    }
}
