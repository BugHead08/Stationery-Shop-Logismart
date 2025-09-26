<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\adminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShoppingHistoryController;

Route::redirect('/', '/products');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
Route::post('/checkout', [CheckoutController::class, 'checkout'])->middleware('auth');

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::post('/products/{id}/add-to-cart', [ProductController::class, 'addToCart'])->name('products.addToCart')->middleware('auth');

Route::get('cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add')->middleware('auth');
Route::patch('cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update')->middleware('auth');
Route::delete('cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove')->middleware('auth');

Route::get('history', [ShoppingHistoryController::class, "index"])->middleware('auth');

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('register', [CustomerController::class, 'create'])->name('customer.create')->middleware('guest');
Route::post('register', [CustomerController::class, 'store'])->name('customer.store')->middleware('guest');

Route::prefix('/admin')->group(function () {
    Route::get("/login", [AdminController::class, "login"])->middleware(adminMiddleware::class)->name("admin:login");
    Route::post("/login", [AdminController::class, "auth"])->middleware(adminMiddleware::class);
    Route::delete("/logout", [AdminController::class, "logout"])->middleware(adminMiddleware::class);

    Route::get("/", [AdminController::class, "index"])->middleware(adminMiddleware::class)->name("admin:product.index");
    Route::get("/products", [AdminController::class, "products"])->middleware(adminMiddleware::class);
    Route::get("/products/create", [AdminController::class, "createProduct"])->middleware(adminMiddleware::class);
    Route::post("/products/create", [AdminController::class, "storeProduct"])->middleware(adminMiddleware::class);

    Route::get("/products/{idProduct}/edit", [AdminController::class, "editProduct"])->middleware(adminMiddleware::class);
    Route::put("/products/{idProduct}/edit", [AdminController::class, "updateProduct"])->middleware(adminMiddleware::class);
    Route::delete("/products/{idProduct}", [AdminController::class, "deleteProduct"])->middleware(adminMiddleware::class);

    Route::get("/customers", [AdminController::class, "customerList"])->middleware(adminMiddleware::class);
    Route::get("/transaction", [AdminController::class, "transactionList"])->middleware(adminMiddleware::class);
    Route::get("/transaction/export", [AdminController::class, "exportTransaction"])->middleware(adminMiddleware::class);

    // Route::delete("/products/{idProduct}", [AdminController::class, "deleteProduct"]);

    // Route::get('/shopping-history', [CheckoutController::class, 'index'])->name('history.index')->middleware('auth');
    // Route::post('/shopping-history', [ShoppingHistoryController::class, 'store'])->name('shopping-history.store')->middleware('auth');

});

