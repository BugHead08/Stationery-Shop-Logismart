<?php

namespace App\Http\Controllers;

use App\Exports\InvoiceExport;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    /**
     * Render the admin home page
     */
    public function index()
    {
        $totalPurchases = Cart::where('status_bayar', 1)->get();

        $topProducts = DB::table('products')
            ->select('products.name', 'products.price', DB::raw('SUM(cart_items.quantity) as total_purchases'))
            ->join('cart_items', 'products.id', '=', 'cart_items.product_id')
            ->join('carts', 'cart_items.cart_id', '=', 'carts.id')
            ->where('carts.status_bayar', '=', 1)
            ->groupBy('products.name', 'products.price')
            ->orderByDesc('total_purchases')
            ->take(5)
            ->get();

        // return var_dump($topProducts);

        return view('admin.index', [
            "totalPurchases" => count($totalPurchases),
            "totalProduct" => count(Product::all()),
            "topProducts" => $topProducts
        ]);
    }

    public function login()
    {
        return view("admin.login");
    }

    /**
     * Render the login page
     */
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:4',
        ]);

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::guard("admin")->login($user);
            auth()->logout();
            return redirect("/admin");
        }

        return redirect()->back()->withErrors(['auth' => 'User not found!']);
    }

    /**
     * Logout the admin
     */
    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect("/admin/login");
    }

    public function products()
    {
        return view("admin.products", [
            "products" => Product::get()
        ]);
    }

    public function createProduct()
    {
        return view("admin.createProduct");
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            "stock" => "required|numeric|min:0"
        ]);

        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $filePath = $fileName;
        $file->move(public_path('images'), $fileName);

        Product::create([
            "image" => $filePath,
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock
        ]);

        return redirect("/admin/products")->with("success", "The product has been created");
    }

    public function editProduct(Request $request, int $idProduct)
    {
        return view("admin.editProduct", [
            "product" => Product::where('id', $idProduct)->first(),
        ]);
    }

    public function updateProduct(Request $request, int $idProduct)
    {
        $isHasImage = $request->hasFile("image");
        $rules = [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            "stock" => "required|numeric|min:0"
        ];

        if ($isHasImage) {
            $rules["image"] = 'required|image|mimes:jpg,png,jpeg';
        }

        $request->validate($rules);
        $product = Product::findOrFail($idProduct);

        if ($isHasImage) {
            if ($product->image && file_exists(public_path('images/' . $product->image))) {
                unlink(public_path('images/' . $product->image));
            }

            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $product->image = $fileName;
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return redirect('/admin/products')->with("success", "Success update product");
        ;
    }

    public function deleteProduct(Request $request, int $idProduct)
    {
        $product = Product::findOrFail($idProduct);

        if (empty($product)) {
            return redirect('/admin/products')->with("error", "Product $idProduct not found");
        }
        if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
        }
        Product::destroy($idProduct);
        return redirect("/admin/products")->with("success", "The product has been removed");
    }

    public function customerList(Request $request)
    {
        $customers = Customer::orderBy("nama", "asc")->get();
        return view("admin.customer", [
            "users" => $customers
        ]);
    }

    public function transactionList(Request $request)
    {
        $transaction = Cart::where('status_bayar', 1)
            ->with(['items' => function ($query) {
                $query->select('cart_id', DB::raw('SUM(quantity * products.price) as total'))
                    ->join('products', 'product_id', '=', 'products.id')
                    ->groupBy('cart_id');
            },
                'customer' => function ($query) {
                    $query->select('id', 'nama', "alamat"); // Pastikan Anda memilih 'id' jika 'id' adalah foreign key
                }
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        return view("admin.transaction", [
            "transactions" => $transaction
        ]);
        // return json_decode($transaction, true);
    }

    public function exportTransaction()
    {
        return Excel::download(new InvoiceExport, "invoice.xlsx");
    }
}
