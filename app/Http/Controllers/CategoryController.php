<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        $categories = Category::all();
        $title =
            count($categories) > 0 ? "Category List" : "No Data is available!";
        return view("pages.category.index", compact("categories", "title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $categories = Category::all();
        $title = "Add Category";
        $stories = [];
        if ($user->is_admin == true) {
            $stories = Store::all();
        } else {
            $stories = Store::select("*")
                ->where("user_id", $user->id)
                ->get();
        }
        return view(
            "pages.category.create",
            compact("categories", "title", "stories")
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
            "name" => "required|unique:categories",
            "store_id" => "required",
        ]);
        $data = $request->only("name", "store_id");
        $created = Category::create($data);
        return redirect()
            ->back()
            ->with("success", "You data added successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $title = "Category List";
        $stores = Store::all();
        return view(
            "pages.category.update",
            compact("category", "stores", "title")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = collect($request->all())
            ->filter(function ($element, $key) {
                return $element !== null;
            })
            ->toArray();
        if (!$request->has("is_active")) {
            $data["is_active"] = false;
        }
        $category->fill($data)->save();
        return redirect()
            ->back()
            ->with("success", "Your data updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()
            ->back()
            ->with("success", "Your data deleted successfully!");
    }
}
