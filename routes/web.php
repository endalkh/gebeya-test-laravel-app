<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("dashboard", [HomeController::class, "index"])->name("dashboard");
Route::get("login", [Auth\LoginController::class, "index"])->name("login");
Route::post("login", [Auth\LoginController::class, "doLogin"])->name("doLogin");
Route::get("signup", [Auth\RegisterController::class, "index"])->name("signup");
// Route::get("signup/options", [Auth\RegisterController::class, "options"])->name("signup.options");
Route::post("signup/doSignup", [Auth\RegisterController::class, "doSignup"])->name(
    "user.doSignup"
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

// Category Route
Route::get("category", [CategoryController::class, "index"])->name("category");
Route::get("category/create", [CategoryController::class, "create"])->name(
    "category.create"
);
Route::post("category/store", [CategoryController::class, "store"])->name(
    "category.store"
);
Route::put("category/{category}", [CategoryController::class, "update"])->name(
    "category.update"
);
Route::get("category/{category}", [CategoryController::class, "show"])->name(
    "category.show"
);
Route::delete("category/{category}", [
    CategoryController::class,
    "destroy",
])->name("category.destroy");

# Store Routes

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
Route::get("store/show/{store}", [StoreController::class, "show"])->name(
    "store.show"
);
Route::put("store/update/{store}", [StoreController::class, "update"])->name(
    "store.update"
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
Route::get("product/show/{product}", [ProductController::class, "show"])->name(
    "product.show"
);
Route::put("product/update/{product}", [
    ProductController::class,
    "update",
])->name("product.update");

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
Route::get("order/show/{order}", [OrderController::class, "show"])->name(
    "order.show"
);
Route::put("order/update/{order}", [OrderController::class, "update"])->name(
    "order.update"
);

#User Management Routes for admin
Route::get("user", [UserController::class, "index"])->name("user");
Route::get("user/create", [UserController::class, "create"])->name(
    "user.create"
);
Route::post("user/store", [UserController::class, "store"])->name("user.store");
Route::delete("user/{user}", [UserController::class, "destroy"])->name(
    "user.destroy"
);
Route::get("user/show/{user}", [UserController::class, "show"])->name(
    "user.show"
);
Route::put("user/update/{user}", [UserController::class, "update"])->name(
    "user.update"
);
