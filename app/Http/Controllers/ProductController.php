<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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
        $categories = Category::all();
        $products = [];
        if ($user->is_admin == true) {
            $products = Product::with("store", "category")->get();
        } else {
            $stores = Store::select("id")
                ->where("user_id", $user->id)
                ->get();
            $ids = [];
            foreach ($stores as $store) {
                array_push($ids, $store->id);
            }
            $products = Product::with("store", "category")
                ->whereIn("store_id", $ids)
                ->get();
        }

        $title =
            count($products) > 0 ? "Product List" : "No Data is available!";

        return view(
            "pages.product.index",
            compact("categories", "products", "title")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $title = "Add Product";
        $user = Auth::user();
        $stores = [];
        if ($user->is_admin == true) {
            $stores = Store::all();
        } else {
            $stores = Store::select("*")
                ->where("user_id", $user->id)
                ->get();
        }
        return view(
            "pages.product.create",
            compact("categories", "title", "stores")
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
        $credentials = $request->validate([
            "name" => "required",
            "price" => "required",
            "qty" => "required",
            "store_id" => "required",
            "category_id" => "required",
            "image" => "required",
        ]);

        $data = $request->only(
            "name",
            "price",
            "qty",
            "store_id",
            "category_id",
            "image"
        );
        if (
            Product::where("name", $data["name"])
                ->where("store_id", $data["store_id"])
                ->exists()
        ) {
            return back()->withErrors([
                "name" => "This product is already existed.",
            ]);
        }
        $created = Product::create($data);

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
    public function show(Product $product)
    {
        $title = "Update Product";
        $user = Auth::user();
        $stores = [];
        if ($user->is_admin == true) {
            $stores = Store::all();
        } else {
            $stores = Store::select("*")
                ->where("user_id", $user->id)
                ->get();
        }
        return view(
            "pages.product.update",
            compact("title", "product", "stores")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = collect($request->all())
            ->filter(function ($element, $key) {
                return $element !== null;
            })
            ->toArray();
        if (!$request->has("is_active")) {
            $data["is_active"] = false;
        }
        $product->fill($data)->save();

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
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
            ->back()
            ->with("success", "Your data deleted successfully!");
    }
}
