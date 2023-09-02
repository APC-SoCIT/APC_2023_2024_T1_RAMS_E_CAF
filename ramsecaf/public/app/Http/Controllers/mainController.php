<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use PhpParser\Node\Stmt\ElseIf_;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order_product;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class mainController extends Controller
{
    public function Home()
    {
        $vendor = User::where('vendor',1)->get();
        return view("index", ['vendor'=>$vendor]);
    }

    public function userlogin(Request $request)
    {
        
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            Alert::error('Incorrect email/password!', '')->showConfirmButton('Confirm', '#AA0F0A');
            return back();
        } else {
            $user = User::where('email', $request->email)->first();
            response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
            ], 200);
            if ($user->role == "vendor-ke" || $user->role == "vendor-lm" || $user->role == "vendor-rb") {
                return redirect()->route("vendorhome");
            } elseif ($user->role == "customer") {
                return redirect()->route("home");
            } elseif ($user->role == "admin") {
                return redirect()->route("aviewreports");
            }
        }
        
    }

    public function signout(Request $request)
    {
        // $redirect = Auth::user()->role;
        // auth()->guest();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        Auth::logout();
        return redirect()->route("login");
    }

    public function vendorhome()
    {
        
        // Get current date and time 
        $now = Carbon::now(); 
        // Get start and end of day 
        $startOfDay = $now->copy()->startOfDay(); 
        $endOfDay = $now->copy()->endOfDay();
        // Get today's sales
        $today = Carbon::today();
        $todaySales = DB::table('order_product')
            ->whereDate('created_at', $today)
            ->sum('product_total');
        // Get weekly sales
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $weeklySales = DB::table('order_product')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->sum('product_total');
        // Get monthly sales
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $monthlySales = DB::table('order_product')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->sum('product_total');
        // Get yearly sales
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();
        $yearlySales = DB::table('order_product')
            ->whereBetween('created_at', [$startOfYear, $endOfYear]);

        $productlist = DB::table('order_product')
        ->join('product', 'product.id', '=', 'order_product.product_id')
        ->select(
            'productname',
            'price',
            DB::raw('count(*) as productsold'),
            DB::raw('SUM(product_total * product_quantity) as total')
        )
        ->whereBetween('order_product.created_at', [$startOfDay, $endOfDay])
        ->groupBy('productname', 'price')
        ->get();

        $startOfWeek = Carbon::now()->startOfWeek(); $endOfWeek = Carbon::now()->endOfWeek();
        $productlist_week = DB::table('order_product')
        ->join('product', 'product.id', '=', 'order_product.product_id')
        ->select(
            'productname',
            'price',
            DB::raw('count(*) as productsold'),
            DB::raw('SUM(product_total * product_quantity) as total')
        )
        ->whereBetween('order_product.created_at', [$startOfWeek, $endOfWeek])
        ->groupBy('productname', 'price')
        ->get();
        
        
        $productlist_month = DB::table('order_product')
        ->join('product', 'product.id', '=', 'order_product.product_id')
        ->select(
            'productname',
            'price',
            DB::raw('count(*) as productsold'),
            DB::raw('SUM(product_total * product_quantity) as total')
        )
        ->whereBetween('order_product.created_at', [$startOfMonth, $endOfMonth])
        ->groupBy('productname', 'price')
        ->get();

        return view('vhome', [
            "product_week" => $productlist_week,
            "product_month" => $productlist_month,
            "product" => $productlist,
            'today_sales' => $todaySales,
            'weekly_sales'=> $weeklySales,
            'monthly_sales' => $monthlySales,
            'yearly_sales' => $yearlySales
        ]);
    }

    public function kitchenexpress()
    {
        $product = Product::where("store_name", "Kitchen Express")->get();
        return view("menu1", ["product" => $product]);
    }

    public function lamudras()
    {
        $product = Product::where("store_name", "La Mudras Corner")->get();
        return view("menu1", ["product" => $product]);
    }

    public function redbrew()
    {
        $product = Product::where("store_name", "Red Brew")->get();
        return view("menu1", ["product" => $product]);
    }

    public function addtocart($product_id)
    {
        $userid = Auth::user()->get()->first()->id;
        $store = Product::where('id',$product_id)->get()->first()->store_name;
        $cart_count = Cart::where("user_id", Auth::user()->get()->first()->id)->where("cart_status", "pending")->count();
        if ($cart_count == 0) {
            Cart::create([
                "user_id" => $userid,
                "cart_status" => "pending",
                "store" => $store
            ]);
        }
        $cart_id = Cart::where("user_id", $userid)->where("cart_status", "pending")->get()->last()->id;

        $product_count = Order_product::where("cart_id", $cart_id)->where("product_id", $product_id)->count();
        $product_price = Product::where("id", $product_id)->get()->first()->price;
        if ($product_count == 0) {
            Order_product::create([
                "cart_id" => $cart_id,
                "product_id" => $product_id,
                "product_quantity" => 1,
                "product_total" => $product_price,

            ]);
        } else {
            $current_quantity = Order_product::where("cart_id", $cart_id)->where("product_id", $product_id)->get()->first()->product_quantity;
            Order_product::where("cart_id", $cart_id)->where("product_id", $product_id)->update([
                "product_quantity" => $current_quantity + 1,
                "product_total" => $product_price * ($current_quantity + 1)
            ]);
        }
        toast('Item added to cart', 'success');
        if($store == 'Kitchen Express'){
            $product = Product::where("store_name", "Kitchen Express")->get();
            return redirect()->route("kitchenexpress", ["product" => $product]);
        }
        if($store == 'La Mudras Corner'){
            $product = Product::where("store_name", "La Mudras Corner")->get();
            return redirect()->route("lamudras", ["product" => $product]);
        }
        if($store == 'Red Brew'){
            $product = Product::where("store_name", "Red Brew")->get();
            return redirect()->route("redbrew", ["product" => $product]);
        }
        
    }

    public function proceedtocart()
    {
        $userid = Auth::user()->get()->first()->id;
        if (Cart::where("user_id", $userid)->where("cart_status", "pending")->count() == 0 ) {
            Alert::warning('No item was added to cart', '')->showConfirmButton('Confirm', '#FCAE28');
            // return redirect()->route("home", ["product" => $product]);
            return back();
        }
        

        $cart_id = Cart::where("user_id", $userid)->where("cart_status", "pending")->get()->last()->id;
        $product = Order_product::join("product", "product.id", "=", "order_product.product_id")->where("cart_id", $cart_id)->get();
        return view("cart", ["product" => $product]);

    }

    public function addquantity($productid, $cartid)
    {
        $cart_id = Order_product::where("product_id", $productid)->where("cart_id", $cartid)->get()->first();
        $updatedquantity = $cart_id->product_quantity + 1;
        $price = Product::where('id', $productid)->get()->first()->price;
        $cart_id->update([
            "product_quantity" => $updatedquantity,
            "product_total" => $updatedquantity * $price
        ]);
        $cart_id = Cart::where("user_id", Auth::user()->get()->first()->id)->where("cart_status", "pending")->get()->last()->id;
        $product = Order_product::join("product", "product.id", "=", "order_product.product_id")->where("cart_id", $cart_id)->get();
        return redirect()->route("proceedtocart", ["product" => $product]);
    }

    public function subtractquantity($productid, $cartid)
    {
        $cart_id = Order_product::where("product_id", $productid)->where("cart_id", $cartid)->get()->first();
        if ($cart_id->product_quantity == 1) {
            $store = Cart::where('id',$cartid)->get()->first()->store;
            $cart_id->delete();
            if (Order_product::where("cart_id", $cartid)->get()->count() == 0) {
                Cart::where("id", $cartid)->delete();
                if($store == 'Kitchen Express'){
                    $product = Product::where("store_name", "Kitchen Express")->get();
                    return redirect()->route("kitchenexpress", ["product" => $product]);
                }
                if($store == 'La Mudras Corner'){
                    $product = Product::where("store_name", "La Mudras Corner")->get();
                    return redirect()->route("lamudras", ["product" => $product]);
                }
                if($store == 'Red Brew'){
                    $product = Product::where("store_name", "Red Brew")->get();
                    return redirect()->route("redbrew", ["product" => $product]);
                }
            }
        } else {
            $updatedquantity = $cart_id->product_quantity - 1;
            $price = Product::where('id', $productid)->get()->first()->price;
            $cart_id->update([
                "product_quantity" => $updatedquantity,
                "product_total" => $updatedquantity * $price
            ]);
            $cart_id = Cart::where("user_id", Auth::user()->get()->first()->id)->where("cart_status", "pending")->get()->last()->id;
        }

        $product = Order_product::join("product", "product.id", "=", "order_product.product_id")->where("cart_id", $cart_id)->get();
        return redirect()->route("proceedtocart", ["product" => $product]);
    }

    public function payment($cartid)
    {
        $cartitems = Order_product::join("product", "product.id", "=", "order_product.product_id")->where("cart_id", $cartid)->get();
        $pendingorders = Cart::where("id", $cartid)->get();
        $pendingorders->first()->update(["cart_status" => "paid"]);
        $orderproduct = Order_product::where('cart_id', $cartid)->get();
        foreach ($orderproduct as $prod) {
            Product::where('id', $prod->product_id)->first()->update([
                "stocks" => (Product::where('id', $prod->product_id)->first()->stocks) - $prod->product_quantity
            ]);
        }
        $user = User::where("id", Cart::where("id", $cartid)->first()->user_id)->get()->first();
        $cartitem = Order_product::join("product", "product.id", "=", "order_product.product_id")->join("cart", "cart.id", "=", "order_product.cart_id")->where("user_id", Auth::user()->get()->first()->id)->where("cart_status", "paid")->get();
        $cart = Cart::where("cart_status", "paid")->get();

        return view("myProfile", ["product" => $cartitem, "cart" => $cart]);
    }

    public function order_summary($cartid)
    {
        $cart = Cart::where("id", $cartid)->get()->last();
        $itemList = Order_product::join("product", "product.id", "=", "order_product.product_id")->where("cart_id", $cartid)->get();

        return view("ordersummary", ["cart" => $cart, "item" => $itemList]);
    }

    public function profile()
    {
        $cartitems = Order_product::join("product", "product.id", "=", "order_product.product_id")->join("cart", "cart.id", "=", "order_product.cart_id")->where("user_id", Auth::user()->get()->first()->id)->where("cart_status", "paid")->get();
        $cart = Cart::where("cart_status", "paid")->get();

        return view("myProfile", ["product" => $cartitems, "cart" => $cart]);
    }

    public function order_confirm(Request $request)
    {
        $cart = Cart::where('id', $request->cartid)->get()->first()->update(['cart_status' => 'claimed']);
        return redirect()->route("vieworders");

    }

    public function orders_summary($cartid)
    {
        $cart = Cart::where('id', $cartid)->get()->first()->update(['cart_status' => 'claimed']);
        return redirect()->route("home");
    }

    public function complete()
    {
        $cartitems = Order_product::join("product", "product.id", "=", "order_product.product_id")
            ->join("cart", "cart.id", "=", "order_product.cart_id")->where("user_id", Auth::user()->get()->first()->id)
            ->where("cart_status", "claimed")->get();
        $cart = Cart::where("cart_status", "claimed")->get();

        $feedback = Feedback::where("user_id", Auth::user()->get()->first()->id)->get();

        return view("orderhistory", ["product" => $cartitems, "cart" => $cart, 'feedback' => $feedback]);
    }

    public function feedback(Request $request)
    {
        Feedback::create([
            "user_id" => $request->user_id,
            "cart_id" => $request->cart_id,
            "comment_1" => $request->comment_1,
            "comment_2" => $request->comment_2,
        ]);
        Alert::success('Thank you!', 'Your feedback has been submitted')->showConfirmButton('Confirm', '#FCAE28');
        return redirect()->route("complete");

    }

    public function receipt($cartid)
    {
        $cart = Cart::where("id", $cartid)->get()->last();
        $itemList = Order_product::join("product", "product.id", "=", "order_product.product_id")->where("cart_id", $cartid)->get();

        return view("receipt", ["cart" => $cart, "item" => $itemList]);
    }

    public function vieworders()
    {
        $user = Auth::user()->role;
        if ($user == "vendor-ke") {
            $cartitems = Order_product::join("product", "product.id", "=", "order_product.product_id")->
                join("cart", "cart.id", "=", "order_product.cart_id")->where("cart_status", "paid")->where("store", "Kitchen Express")->get();
            $cart = Cart::where("cart_status", "paid")->where("store", "Kitchen Express")->get();

            $cartitems_claimed = Order_product::join("product", "product.id", "=", "order_product.product_id")->
                join("cart", "cart.id", "=", "order_product.cart_id")->where("cart_status", "claimed")->where("store", "Kitchen Express")->get();
            $cart_claimed = Cart::where("cart_status", "claimed")->where("store", "Kitchen Express")->get();

            $productlist = Product::where("store_name", "Kitchen Express")->where('isactive',1)->get();
            return view("vorders", ["product_list" => $productlist, "product" => $cartitems, "cart" => $cart, "product_claimed" => $cartitems_claimed, "cart_claimed" => $cart_claimed]);
        }
        if ($user == "vendor-rb") {
            $cartitems = Order_product::join("product", "product.id", "=", "order_product.product_id")->
                join("cart", "cart.id", "=", "order_product.cart_id")->where("cart_status", "paid")->where("store", "Red Brew")->get();
            $cart = Cart::where("cart_status", "paid")->where("store", "Red Brew")->get();

            $cartitems_claimed = Order_product::join("product", "product.id", "=", "order_product.product_id")->
                join("cart", "cart.id", "=", "order_product.cart_id")->where("cart_status", "claimed")->where("store", "Red Brew")->get();
            $cart_claimed = Cart::where("cart_status", "claimed")->where("store", "Red Brew")->get();

            $productlist = Product::where("store_name", "Red Brew")->where('isactive',1)->get();
            return view("vorders", ["product_list" => $productlist, "product" => $cartitems, "cart" => $cart, "product_claimed" => $cartitems_claimed, "cart_claimed" => $cart_claimed]);
        }
        if ($user == "vendor-lm") {
            $cartitems = Order_product::join("product", "product.id", "=", "order_product.product_id")->
                join("cart", "cart.id", "=", "order_product.cart_id")->where("cart_status", "paid")->where("store", "La Mudras Corner")->get();
            $cart = Cart::where("cart_status", "paid")->where("store", "La Mudras Corner")->get();

            $cartitems_claimed = Order_product::join("product", "product.id", "=", "order_product.product_id")->
                join("cart", "cart.id", "=", "order_product.cart_id")->where("cart_status", "claimed")->where("store", "La Mudras Corner")->get();
            $cart_claimed = Cart::where("cart_status", "claimed")->where("store", "La Mudras Corner")->get();

            $productlist = Product::where("store_name", "La Mudras Corner")->where('isactive',1)->get();
            return view("vorders", ["product_list" => $productlist, "product" => $cartitems, "cart" => $cart, "product_claimed" => $cartitems_claimed, "cart_claimed" => $cart_claimed]);
        }

    }

    public function completeorder()
    {
        $cartitems = Order_product::join("product", "product.id", "=", "order_product.product_id")->join("cart", "cart.id", "=", "order_product.cart_id")->where("user_id", Auth::user()->get()->first()->id)->where("cart_status", "claimed")->get();
        $cart = Cart::where("cart_status", "claimed")->get();

        return view("vorders", ["product" => $cartitems, "cart" => $cart]);
    }

    public function updatestock($adj, $id)
    {
        if ($adj == "+") {
            $stock = Product::where("id", $id)->get()->first()->stocks;
            Product::where("id", $id)->get()->first()->update([
                "stocks" => $stock + 1
            ]);
        } else {
            $stock = Product::where("id", $id)->get()->first()->stocks;
            Product::where("id", $id)->get()->first()->update([
                "stocks" => $stock - 1
            ]);
        }
        return redirect()->route("vieworders");
    }

    public function editmenu()
    {
        $user = Auth::user()->role;
        if ($user == "vendor-ke") {
            $productlist = Product::where("store_name", "Kitchen Express")->get();
            return view("veditmenu", ["product_list" => $productlist,]);
        }
        if ($user == "vendor-lm") {
            $productlist = Product::where("store_name", "La Mudras Corner")->get();
            return view("veditmenu", ["product_list" => $productlist,]);
        }
        if ($user == "vendor-rb") {
            $productlist = Product::where("store_name", "Red Brew")->get();
            return view("veditmenu", ["product_list" => $productlist,]);
        }
    }

    public function feedbackview($cartid)
    {
        return view("feedback", ['cartid' => $cartid, "user_id" => Auth::user()->id]);
    }

    public function vendorfeedbacks()
    {
        $user = Auth::user()->role;
        if ($user == "vendor-ke") {
            $feedbacklist = Feedback::join('cart', 'cart.id', '=', 'feedback.cart_id')->
                select('feedback.*', 'cart.store')->where('store', 'Kitchen Express')->get();
            return view("vviewfeedback", ["feedbacklist" => $feedbacklist,]);
        }
        if ($user == "vendor-rb") {
            $feedbacklist = Feedback::join('cart', 'cart.id', '=', 'feedback.cart_id')->
                select('feedback.*', 'cart.store')->where('store', 'Red Brew')->get();
            return view("vviewfeedback", ["feedbacklist" => $feedbacklist,]);
        }
        if ($user == "vendor-lm") {
            $feedbacklist = Feedback::join('cart', 'cart.id', '=', 'feedback.cart_id')->
                select('feedback.*', 'cart.store')->where('store', 'La Mudras Corner')->get();
            return view("vviewfeedback", ["feedbacklist" => $feedbacklist,]);
        }
        if ($user == "admin") {
            $feedbacklist = Feedback::join('cart', 'cart.id', '=', 'feedback.cart_id')->
                select('feedback.*', 'cart.store')->get();
            return view("viewfeedbacks", ["feedbacklist" => $feedbacklist,]);
        }

    }

    public function updatemenu(Request $request)
    {
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $request->productname . '_' . date("Y-m-d-H-i-s") . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/images'), $filename);
        } else {
            $filename = Product::where('id', $request->id)->get()->first()->image;
        }
        Product::where('id', $request->id)->get()->first()->update([
            'image' => $filename,
            'productname' => $request->productname,
            'stocks' => $request->stocks,
            'price' => $request->price

        ]);
        return redirect()->route("editmenu");
    }

    public function updatestatus($id)
    {
        $status = Product::where('id', $id)->get()->first()->isactive;
        if ($status == 1) {
            Product::where('id', $id)->get()->first()->update([
                'isactive' => 0,
            ]);

        } else {
            Product::where('id', $id)->get()->first()->update([
                'isactive' => 1,
            ]);
        }
        return redirect()->route("editmenu");
    }

    public function additem(Request $request)
    {
        $user = Auth::user()->role;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $request->productname . '_' . date("Y-m-d-H-i-s") . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/images'), $filename);
        }

        if ($user == "vendor-ke") {
            Product::create([
                'image' => $filename,
                'productname' => $request->productname,
                'category' => $request->category,
                'stocks' => $request->stocks,
                'price' => $request->price,
                'store_name' => "Kitchen Express"
            ]);
        }
        if ($user == "vendor-rb") {
            Product::create([
                'image' => $filename,
                'productname' => $request->productname,
                'category' => $request->category,
                'stocks' => $request->stocks,
                'price' => $request->price,
                'store_name' => "Red Brew"
            ]);
        }
        if ($user == "vendor-lm") {
            Product::create([
                'image' => $filename,
                'productname' => $request->productname,
                'category' => $request->category,
                'stocks' => $request->stocks,
                'price' => $request->price,
                'store_name' => "La Mudras Corner"
            ]);
        }
        return redirect()->route("editmenu");
    }

    public function aviewreports()
    {
         // Get current date and time 
         $now = Carbon::now(); 
         // Get start and end of day 
         $startOfDay = $now->copy()->startOfDay(); 
         $endOfDay = $now->copy()->endOfDay();
         // Get today's sales
         $today = Carbon::today();
         $todaySales = DB::table('order_product')
             ->whereDate('created_at', $today)
             ->sum('product_total');
         // Get weekly sales
         $startOfWeek = Carbon::now()->startOfWeek();
         $endOfWeek = Carbon::now()->endOfWeek();
         $weeklySales = DB::table('order_product')
             ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
             ->sum('product_total');
         // Get monthly sales
         $startOfMonth = Carbon::now()->startOfMonth();
         $endOfMonth = Carbon::now()->endOfMonth();
         $monthlySales = DB::table('order_product')
             ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
             ->sum('product_total');
         // Get yearly sales
         $startOfYear = Carbon::now()->startOfYear();
         $endOfYear = Carbon::now()->endOfYear();
         $yearlySales = DB::table('order_product')
             ->whereBetween('created_at', [$startOfYear, $endOfYear]);
 
         $productlist = DB::table('order_product')
         ->join('product', 'product.id', '=', 'order_product.product_id')
         ->select(
             'productname',
             'price',
             DB::raw('count(*) as productsold'),
             DB::raw('SUM(product_total * product_quantity) as total')
         )
         ->whereBetween('order_product.created_at', [$startOfDay, $endOfDay])
         ->groupBy('productname', 'price')
         ->get();

         $startOfWeek = Carbon::now()->startOfWeek(); $endOfWeek = Carbon::now()->endOfWeek();
         $productlist_week = DB::table('order_product')
         ->join('product', 'product.id', '=', 'order_product.product_id')
         ->select(
             'productname',
             'price',
             DB::raw('count(*) as productsold'),
             DB::raw('SUM(product_total * product_quantity) as total')
         )
         ->whereBetween('order_product.created_at', [$startOfWeek, $endOfWeek])
         ->groupBy('productname', 'price')
         ->get();
 
         return view('viewreports', [
             "product_week" => $productlist_week,
             "product" => $productlist,
             'today_sales' => $todaySales,
             'weekly_sales'=> $weeklySales,
             'monthly_sales' => $monthlySales,
             'yearly_sales' => $yearlySales
         ]);
        
    }

    public function aeditvendor()
    {
        $user = Auth::user()->role;
        if ($user == "admin") {
            $productlist = User::where("vendor", 1)->get();
            return view("editstalls", ["product_list" => $productlist,]);
        }
    }

    public function vendorupdatestatus($id)
    {
        $status = User::where('id', $id)->get()->first()->isactive;
        if ($status == 1) {
            User::where('id', $id)->update([
                'isactive' => 0,
            ]);

        } else {
            User::where('id', $id)->update([
                'isactive' => 1,
            ]);
        }
        return redirect()->route('aeditvendor');
    }

 
}