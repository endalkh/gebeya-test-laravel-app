<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function store(Request $request)
    {
        dd($request->all());
        $credentials = $request->validate([
            "product_id" => "required",
            "price" => "required",
            "qty" => "required",
        ]);
        $data = $request->only("product_id", "price", "qty", "status");
        $data["total"] = $data["qty"] * $data["price"];
        $created = Cart::create($data);

        return redirect()
            ->back()
            ->with("success", "You data added successfully!");
    }
}
