<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Alert;
class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function store(Request $request)
    {
        // Alert::success('Congrats', 'You\'ve Successfully Registered');
        
        // $credentials = $request->validate([
        //     "product_id" => "required",
        //     "price" => "required",
        //     "qty" => "required",
        // ]);
        // $data = $request->only("product_id", "price", "qty", "status");
        // $data["total"] = $data["qty"] * $data["price"];
        // $created = Cart::create($data);

        return redirect()
            ->back()
            ->with("success", "You data added successfully!");
    }
    public function show(Cart $cart)
    {
        $title = "Add to Cart";
        return view("pages.order.update", compact("title", "cart"));
    }
}
