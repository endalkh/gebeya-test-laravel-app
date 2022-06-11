<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
        $orders = Order::with("product")->get();

        $title = count($orders) > 0 ? "Order List" : "No Data is available!";

        return view("pages.order.index", compact("orders", "title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $products = Product::all();
        $title = "Add Order";
        return view(
            "pages.order.create",
            compact("categories", "title", "products")
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
        $auth = Auth::user();
        $credentials = $request->validate([
            "product_id" => "required",
            "price" => "required",
            "qty" => "required",
            "status" => "required",
        ]);
        $data = $request->only("product_id", "price", "qty");
        $data["total"] = $data["qty"] * $data["price"];
        $data["created_by"] = $auth->id;
        $data["status"] = "Open";
        $created = Order::create($data);

        return redirect()
            ->back()
            ->with("success", "You data added successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $title = "Update Order";
        $user = Auth::user();
        $products = Product::all();
        // dd($products);

        return view(
            "pages.order.update",
            compact("title", "order", "products")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $data = collect($request->all())
            ->filter(function ($element, $key) {
                return $element !== null;
            })
            ->toArray();

        $order->fill($data)->save();
        return redirect()
            ->back()
            ->with("success", "Your data updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()
            ->back()
            ->with("success", "Your data deleted successfully!");
    }
}
