<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("login", [Auth\LoginController::class, "index"])->name("login");
Route::post("login", [Auth\LoginController::class, "doLogin"])->name("doLogin");
Route::get("signup", [Auth\RegisterController::class, "index"])->name("signup");
Route::post("signup", [Auth\RegisterController::class, "doSignup"])->name(
    "doSignup"
);
Route::get("/logout", [HomeController::class, "signOut"])->name("logout");
Route::get("forgot-password", [
    Auth\LoginController::class,
    "showForgotPassword",
])->name("password.request");
Route::post("/forgot-password", [
    Auth\LoginController::class,
    "doForgotPassword",
])->name("password.email");
Route::get("category", [CategoryController::class, "index"])->name("category");
Route::get("category/create", [CategoryController::class, "create"])->name(
    "category.create"
);
Route::post("category/store", [CategoryController::class, "store"])->name(
    "category.store"
);
Route::get("store", [StoreController::class, "index"])->name("store");
Route::get("store/create", [StoreController::class, "create"])->name(
    "store.create"
);
Route::post("store/store", [StoreController::class, "store"])->name(
    "store.store"
);
Route::delete("store/{store}", [StoreController::class, "destroy"])->name(
    "store.destroy"
);

# Product Routes
Route::get("product", [ProductController::class, "index"])->name("product");
Route::get("product/create", [ProductController::class, "create"])->name(
    "product.create"
);
Route::post("product/store", [ProductController::class, "store"])->name(
    "product.store"
);
Route::delete("product/{product}", [ProductController::class, "destroy"])->name(
    "product.destroy"
);

#Order Routes
Route::get("order", [OrderController::class, "index"])->name("order");
Route::get("order/create", [OrderController::class, "create"])->name(
    "order.create"
);
Route::post("order/store", [OrderController::class, "store"])->name(
    "order.store"
);
Route::delete("order/{order}", [OrderController::class, "destroy"])->name(
    "order.destroy"
);