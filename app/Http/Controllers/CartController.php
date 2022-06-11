<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $auth = Auth::user();
        $carts = Cart::with("product", "createdBy")
            ->where("created_by", $auth->id)
            ->get();

        $title = count($carts) > 0 ? "My Carts" : "No Data is available!";

        return view("pages.cart.index", compact("title", "carts"));
    }
    public function store(Request $request)
    {
        $credentials = $request->validate([
            "product_id" => "required",
            "price" => "required",
            "qty" => "required",
            "created_by" => "required",
        ]);
        $data = $request->only("product_id", "price", "qty", "created_by");
        $data["total"] = $data["qty"] * $data["price"];
        $created = Cart::create($data);

        return redirect()
            ->back()
            ->with("success", "You data added successfully!");
    }
    public function update(Request $request, Cart $cart)
    {
        // $data = collect($request->all())
        //     ->filter(function ($element, $key) {
        //         return $element !== null;
        //     })
        //     ->toArray();

        // $credentials = $request->validate([
        //     "qty" => "required",
        // ]);

        $cart->update($request->all());

        // $cart->fill($data)->save();
        return redirect()
            ->back()
            ->with("success", "Your data updated successfully!");
    }
}
