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
use Sentiment\Analyzer;




class mainController extends Controller
{
    public function Home()
    {
        $vendor = User::where('vendor', 1)->get();
        $userid = Auth::user()->id;

        // For Kitchen Express
        // $kitchen_Express = Cart::where('user_id', $userid)->where('store', 'Kitchen Express')->get()->last();
        // $kitchen_Express_list = Order_product::join("product", "product.id", "=", "order_product.product_id")->where("cart_id", $kitchen_Express->id)->get();

        // For Red Brew (Assuming you have a similar database structure)


        // For La Mudras (Assuming you have a similar database structure)


        return view("index", [
            'vendor' => $vendor,
            // "kitchen_express" => $kitchen_Express,
            // 'kitchen_Express_list' => $kitchen_Express_list,


        ]);
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
        $user = Auth::user();

        // Ensure the user is a vendor
        if ($user->vendor !== 1) {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        $storeName = $user->role;


        if ($user->role == 'vendor-ke') {
            $storeName = "Kitchen Express";
            $bg = "images/kexpresscaf.png";
            $logo = "images/kitchenexpress.png";
        } elseif ($user->role == 'vendor-lm') {
            $storeName = "La Mudras Corner";
            $bg = "images/lmbg.png";
            $logo = "images/La Mudras Corner.png";
        }


        $now = Carbon::now();
        $startOfDay = $now->copy()->startOfDay();
        $endOfDay = $now->copy()->endOfDay();
        $today = Carbon::today();
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $dailySales = Order_product::whereBetween('created_at', [$startOfDay, $endOfDay])
            ->sum(DB::raw('product_quantity * product_total'));

        // Calculate weekly sales
        $weeklySales = Order_product::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->sum(DB::raw('product_quantity * product_total'));

        // Calculate monthly sales
        $monthlySales = DB::table('order_product')
            ->join('product', 'product.id', '=', 'order_product.product_id')
            ->whereBetween('order_product.created_at', [$startOfMonth, $endOfMonth])
            ->sum('product_total');

        // Rest of your controller logic

        $productlist = DB::table('order_product')
            ->join('product', 'product.id', '=', 'order_product.product_id')
            ->select(
                'productname',
                'price',
                DB::raw('count(*) as productsold'),
                DB::raw('SUM(product_total * product_quantity) as total')
            )
            ->whereBetween('order_product.created_at', [$startOfDay, $endOfDay])
            ->where('store_name', $storeName)
            ->groupBy('productname', 'price')
            ->get();

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $productlist_week = DB::table('order_product')
            ->join('product', 'product.id', '=', 'order_product.product_id')
            ->select(
                'productname',
                'price',
                DB::raw('count(*) as productsold'),
                DB::raw('SUM(product_total * product_quantity) as total')
            )
            ->whereBetween('order_product.created_at', [$startOfWeek, $endOfWeek])
            ->where('store_name', $storeName)
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
            ->where('store_name', $storeName)
            ->groupBy('productname', 'price')
            ->get();

        // Get the top 3 best-selling products
        $bestSellers = DB::table('order_product')
            ->join('product', 'product.id', '=', 'order_product.product_id')->where('store_name', $storeName)
            ->select(
                'productname',
                'price',
                DB::raw('count(*) as productsold'),
                DB::raw('SUM(product_total) as total')
            )

            ->groupBy('productname', 'price')
            ->orderByDesc('productsold')
            ->limit(3)
            ->get();
        

        return view('vhome', [
            'product' => $productlist,
            'product_week' => $productlist_week,
            'product_month' => $productlist_month,
            'best_sellers' => $bestSellers,
            'dailySales' => $dailySales,
            'weeklySales' => $weeklySales,
            'monthlySales' => $monthlySales,
            "storename" => $storeName,
            "bg" => $bg,
            "logo" => $logo


        ]);

    }


    public function kitchenexpress()
    {

        $userid = Auth::user()->id;
        if (Cart::where("user_id", $userid)->where("cart_status", "pending")->count() == 0 || Cart::where("user_id", $userid)->where("cart_status", "pending")->get()->first()->store == 'Kitchen Express') {
            
            $bestSellers = DB::table('order_product')
                ->join('product', 'product.id', '=', 'order_product.product_id')->where('store_name', "Kitchen Express")
                ->select(

                    'productname',
                    'price',
                    DB::raw('count(*) as productsold'),
                    DB::raw('SUM(product_total) as total')
                )

                ->groupBy('productname', 'price')
                ->orderByDesc('productsold')
                ->limit(3)
                ->get();
            $bestproduct = Product::whereIn('productname', [$bestSellers[0]->productname, $bestSellers[1]->productname, $bestSellers[2]->productname])->get();
            $product = Product::where("store_name", "Kitchen Express")->whereNotIn('productname', [$bestSellers[0]->productname, $bestSellers[1]->productname, $bestSellers[2]->productname])->get();
            return view("menu1", ["product" => $product, "bestseller" => $bestproduct]);
        }
        if (Cart::where("user_id", $userid)->where("cart_status", "pending")->get()->first()->store != 'Kitchen Express') {
            Alert::warning('You have pending items from ' . Cart::where("user_id", $userid)->where("cart_status", "pending")->get()->first()->store, '')->showConfirmButton('Confirm', '#FCAE28');
            // return redirect()->route("home", ["product" => $product]);
            return back();
        }

    }

    public function lamudras()
    {

        $userid = Auth::user()->id;
        if (Cart::where("user_id", $userid)->where("cart_status", "pending")->count() == 0 || Cart::where("user_id", $userid)->where("cart_status", "pending")->get()->first()->store == 'La Mudras Corner') {
            $bestSellers = DB::table('order_product')
                ->join('product', 'product.id', '=', 'order_product.product_id')->where('store_name', "La Mudras Corner")
                ->select(

                    'productname',
                    'price',
                    DB::raw('count(*) as productsold'),
                    DB::raw('SUM(product_total) as total')
                )

                ->groupBy('productname', 'price')
                ->orderByDesc('productsold')
                ->limit(3)
                ->get();
            $bestproduct = Product::whereIn('productname', [$bestSellers[0]->productname, $bestSellers[1]->productname, $bestSellers[2]->productname])->get();
            $product = Product::where("store_name", "La Mudras Corner")->whereNotIn('productname', [$bestSellers[0]->productname, $bestSellers[1]->productname, $bestSellers[2]->productname])->get();
            return view("menu1", ["product" => $product, "bestseller" => $bestproduct]);
        }
        if (Cart::where("user_id", $userid)->where("cart_status", "pending")->get()->first()->store != 'La Mudras Corner') {
            Alert::warning('You have pending items from ' . Cart::where("user_id", $userid)->where("cart_status", "pending")->get()->first()->store, '')->showConfirmButton('Confirm', '#FCAE28');
            // return redirect()->route("home", ["product" => $product]);
            return back();
        }
    }

    public function redbrew()
    {
        $userid = Auth::user()->id;
        if (Cart::where("user_id", $userid)->where("cart_status", "pending")->count() == 0 || Cart::where("user_id", $userid)->where("cart_status", "pending")->get()->first()->store == 'Red Brew') {
            $product = Product::where("store_name", "Red Brew")->get();
            return view("menu1", ["product" => $product]);
        }
        if (Cart::where("user_id", $userid)->where("cart_status", "pending")->get()->first()->store != 'Red Brew') {
            Alert::warning('You have pending items from ' . Cart::where("user_id", $userid)->where("cart_status", "pending")->get()->first()->store, '')->showConfirmButton('Confirm', '#FCAE28');
            // return redirect()->route("home", ["product" => $product]);
            return back();
        }
    }

    public function addtocart($product_id)
    {
        $userid = Auth::user()->id; // Use the currently authenticated user's ID
        $store = Product::where('id', $product_id)->value('store_name');
        $cart_count = Cart::where("user_id", $userid)->where("cart_status", "pending")->count();

        if ($cart_count == 0) {
            Cart::create([
                "user_id" => $userid,
                "cart_status" => "pending",
                "store" => $store
            ]);
        }

        $cart = Cart::where("user_id", $userid)->where("cart_status", "pending")->first();
        $cart_id = $cart->id;

        $product_count = Order_product::where("cart_id", $cart_id)->where("product_id", $product_id)->count();
        $product_price = Product::where("id", $product_id)->value('price');

        if ($product_count == 0) {
            Order_product::create([
                "cart_id" => $cart_id,
                "product_id" => $product_id,
                "product_quantity" => 1,
                "product_total" => $product_price
            ]);
        } else {
            $current_quantity = Order_product::where("cart_id", $cart_id)->where("product_id", $product_id)->value('product_quantity');
            Order_product::where("cart_id", $cart_id)->where("product_id", $product_id)->update([
                "product_quantity" => $current_quantity + 1,
                "product_total" => $product_price * ($current_quantity + 1)
            ]);
        }

        toast('Item added to cart', 'success');

        // Redirect based on the store
        if ($store == 'Kitchen Express') {
            $products = Product::where("store_name", "Kitchen Express")->get();
            return redirect()->route("kitchenexpress", ["product" => $products]);
        } elseif ($store == 'La Mudras Corner') {
            $products = Product::where("store_name", "La Mudras Corner")->get();
            return redirect()->route("lamudras", ["product" => $products]);
        } elseif ($store == 'Red Brew') {
            $products = Product::where("store_name", "Red Brew")->get();
            return redirect()->route("redbrew", ["product" => $products]);
        }

        return redirect()->back();
    }


    public function proceedtocart()
    {
        $userid = Auth::user()->id;

        if (Cart::where("user_id", $userid)->where("cart_status", "pending")->count() == 0) {
            Alert::warning('No item was added to cart', '')->showConfirmButton('Confirm', '#FCAE28');
            return back();
        }

        $cart = Cart::where("user_id", $userid)->where("cart_status", "pending")->latest()->first();
        $cart_id = $cart->id;

        $created_at = $cart->created_at;
        $pickup_time = $created_at->addMinutes(500);

        $product = Order_product::join("product", "product.id", "=", "order_product.product_id")->where("cart_id", $cart_id)->get();

        // Pass pickup_time instead of created_time
        return view("cart", [
            "product" => $product,
            "pickup_time" => $pickup_time->format('Y-m-d H:i:s') // Format pickup time
        ]);
    }


    public function orderAgain($cartid)
    {
        $userid = Auth::user()->id;
        $pending = Cart::where('user_id', $userid)->where('cart_status', 'pending')->get()->count();
        if ($pending == 0) {
            // Retrieve the products from the specified cart
            $products = Order_product::where('cart_id', $cartid)->get();


            // Create a new cart for the authenticated user (assuming user is authenticated)
            $newCart = Cart::create([
                'user_id' => $userid,
                'cart_status' => 'pending',
                // You can change the status as needed
                'store' => Cart::where('id', $cartid)->get()->last()->store,
            ]);

            // Add the products from the previous order to the new cart
            foreach ($products as $product) {
                Order_product::create([
                    'cart_id' => $newCart->id,
                    'product_id' => $product->product_id,
                    'product_quantity' => $product->product_quantity,
                    'product_total' => $product->product_total
                ]);
            }

            // Redirect the user to their cart or any other appropriate page
            return redirect()->route('proceedtocart');
        }
        Alert::warning('You have pending items from ' . Cart::where("user_id", $userid)->where("cart_status", "pending")->get()->first()->store, '')->showConfirmButton('Confirm', '#FCAE28');
        return redirect()->back();
    }



    public function addquantity($productid, $cartid)
    {
        $userid = Auth::user()->id;
        $cart_id = Cart::where("user_id", Auth::user()->id)->where("cart_status", "pending")->get()->last()->id;
        $product = Order_product::join("product", "product.id", "=", "order_product.product_id")->where("cart_id", $cart_id)->get();
        $cart_id = Order_product::where("product_id", $productid)->where("cart_id", $cartid)->get()->first();
        if (Product::where('id', $productid)->get()->first()->stocks <= 1) {
            toast('Product not found', 'error');
            return redirect()->route("proceedtocart", ["product" => $product]);
        }
        $updatedquantity = $cart_id->product_quantity + 1;
        $price = Product::where('id', $productid)->get()->first()->price;
        $cart_id->update([
            "product_quantity" => $updatedquantity,
            "product_total" => $updatedquantity * $price
        ]);
        return redirect()->route("proceedtocart", ["product" => $product]);
    }

    public function subtractquantity($productid, $cartid)
    {
        $userid = Auth::user()->id;
        $cart_id = Order_product::where("product_id", $productid)->where("cart_id", $cartid)->get()->first();
        if ($cart_id->product_quantity == 1) {
            $store = Cart::where('id', $cartid)->get()->first()->store;
            $cart_id->delete();
            if (Order_product::where("cart_id", $cartid)->get()->count() == 0) {
                Cart::where("id", $cartid)->delete();
                if ($store == 'Kitchen Express') {
                    $product = Product::where("store_name", "Kitchen Express")->get();
                    return redirect()->route("kitchenexpress", ["product" => $product]);
                }
                if ($store == 'La Mudras Corner') {
                    $product = Product::where("store_name", "La Mudras Corner")->get();
                    return redirect()->route("lamudras", ["product" => $product]);
                }
                if ($store == 'Red Brew') {
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
            $cart_id = Cart::where("user_id", Auth::user()->id)->where("cart_status", "pending")->get()->last()->id;
        }

        $product = Order_product::join("product", "product.id", "=", "order_product.product_id")->where("cart_id", $cart_id)->get();
        return redirect()->route("proceedtocart", ["product" => $product]);
    }

    public function payment($cartid)
    {


        $user_id = Cart::where("id", $cartid)->get()->first()->user_id;

        $name = User::where('id', $user_id)->get()->first()->name;
        $email = User::where('id', $user_id)->get()->first()->email;
        $store = Cart::where("id", $cartid)->get()->first()->store;

        $result = Order_product::join("product", "product.id", "=", "order_product.product_id")
            ->where("cart_id", $cartid)
            ->get();

        $jsonFormattedResult = $result->toJson();
        $data = json_decode($jsonFormattedResult, true);

        // Create a new array with "amount," "name," "quantity," and "currency" fields
        $filteredData = array_map(function ($item) {
            // Assuming "price" is the amount field
            // Format the amount with two decimal places and add a zero before if needed
            $formattedAmount = number_format($item["price"], 2, '', '');

            return [
                "currency" => "PHP",
                "amount" => intval($formattedAmount),
                "name" => $item["productname"],
                // Assuming "productname" is the name field
                "quantity" => $item["product_quantity"],
            ];
        }, $data);

        // Encode the filtered data back to JSON format
        $jsonResult = json_encode($filteredData);

        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://api.paymongo.com/v1/checkout_sessions', [
            'body' => '{"data":
                {"attributes":
                    {"billing":
                        {"name":"' . $name . '",
                            "email":"' . $email . '"},
                            "send_email_receipt":true,
                            "show_description":true,
                            "show_line_items":true,
                            "description":"' . $store . '",
                            "line_items":' . $jsonResult . ',
                                "payment_method_types":[
                                    "gcash","grab_pay","paymaya"
                                ],
                                "reference_number":"ORDER' . Cart::where("id", $cartid)->get()->first()->id . '",
                                "success_url":"http://127.0.0.1:8000/success/' . Cart::where("id", $cartid)->get()->first()->id . '",
                                "cancel_url":"http://127.0.0.1:8000/proceedtocart"}}}',
            'headers' => [
                'Content-Type' => 'application/json',
                'accept' => 'application/json',
                'authorization' => 'Basic c2tfdGVzdF9YNnlqaVFpcHdjNTdWY2lob3ZkcWhOSHo6',
            ],
        ]);


        // Assuming $responseData contains the JSON response
        $responseData = json_decode($response->getBody(), true);

        // Access the 'checkout_url' attribute
        $checkoutUrl = $responseData['data']['attributes']['checkout_url'];

        // Now, $checkoutUrl contains the checkout URL

        return redirect($checkoutUrl);

    }


    public function success($cartid)
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
        $cartitem = Order_product::join("product", "product.id", "=", "order_product.product_id")->join("cart", "cart.id", "=", "order_product.cart_id")->where("user_id", Auth::user()->id)->where("cart_status", "paid")->get();
        $cart = Cart::where("cart_status", "paid")->get();

        // $created_at = $cart->created_at;
        // $pickup_time = $created_at->addMinutes(500);


        return view("myProfile", [
            "product" => $cartitem,
            "cart" => $cart,
            // "pickup_time" => $pickup_time->format('Y-m-d H:i:s')
        ]);
    }

    public function order_summary($cartid)
    {
        $cart = Cart::where("id", $cartid)->get()->last();
        $itemList = Order_product::join("product", "product.id", "=", "order_product.product_id")->where("cart_id", $cartid)->get();

        return view("ordersummary", ["cart" => $cart, "item" => $itemList]);
    }

    public function profile()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Retrieve orders for the authenticated user
        $cartItems = Order_product::join('product', 'product.id', '=', 'order_product.product_id')
            ->join('cart', 'cart.id', '=', 'order_product.cart_id')
            ->where('cart.user_id', $userId) // Only show orders for the authenticated user
            ->where('cart.cart_status', 'paid')
            ->get();

        // Retrieve all paid carts (not sure why you need this, but including it as requested)
        $cart = Cart::where('cart_status', 'paid')->get();
        // $created_at = $cart->created_at;
        // $pickup_time = $created_at->addMinutes(500);

        return view('myProfile', [
            'product' => $cartItems,
            'cart' => $cart,
        ]);
    }

    public function order_confirm(Request $request)
    {
        $cart = Cart::where('id', $request->cartid)->get()->first()->update(['cart_status' => 'claimed']);
        toast('Order Claimed!', 'success');
        return redirect()->route("vieworders");
    }

    public function orders_summary($cartid)
    {
        $cart = Cart::where('id', $cartid)->get()->first()->update(['cart_status' => 'claimed']);
        return redirect()->route("home");
    }

    public function complete()
    {
        $userId = Auth::id();
        $user = Auth::user();

        // Retrieve completed orders for the authenticated user
        $cartitems = Order_product::join("product", "product.id", "=", "order_product.product_id")
            ->join("cart", "cart.id", "=", "order_product.cart_id")
            ->where("user_id", $userId)
            ->where("cart_status", "claimed")
            ->get();

        // Retrieve carts with "claimed" status for the authenticated user
        $cart = Cart::where("user_id", $userId)
            ->where("cart_status", "claimed")
            ->get();

        // Retrieve feedback for the authenticated user
        $feedback = Feedback::where("user_id", $userId)->get();

        return view("orderhistory", ["product" => $cartitems, "cart" => $cart, 'feedback' => $feedback]);
    }


    public function feedback(Request $request)
    {
        $analyzer = new Analyzer();
        // Include your sentiment analysis library or implement one if not available
        // Example: require_once('sentiment.php');
        $analyzer_2 = new Analyzer();
        // Define new food-related words and their sentiment scores
        $newWords = [
            'delicious' => '2.0',
            'tasty' => '1.5',
            'yummy' => '1.5',
            'exquisite' => '2.0',
            'bland' => '-1.5',
            'slow' => '-1.5',
            'unappetizing' => '-2.0',
            'disgusting' => '-2.5',
            'satisfying' => '1.0',
            'overcooked' => '-1.0',
            'scrumptious' => '2.0',
            'mouthwatering' => '1.8',
            'flavorful' => '1.7',
            'appetizing' => '1.4',
            'tasteless' => '-1.3',
            'horrible' => '-2.5',
            'repulsive' => '-2.3',
            'palatable' => '1.2',
            'undercooked' => '-1.2',
            'divine' => '2.2',
            'heavenly' => '2.1',
            'savory' => '1.6',
            'disappointing' => '-1.8',
            'amazing' => '2.5',
            'fantastic' => '2.4',
            'mediocre' => '-1.0',
            'soggy' => '-1.4',
            'juicy' => '1.7',
            // Add more food-related words and their sentiment scores as needed
        ];

        $analyzer->updateLexicon($newWords);
        $analyzer_2->updateLexicon($newWords);

        $output_text_comment1 = $analyzer->getSentiment(str_replace("very", "", $request->comment_1));
        $output_text_comment2 = $analyzer_2->getSentiment(str_replace("very", "", $request->comment_2));
        $mood = '';

        if ($output_text_comment1['neg'] > 0 && $output_text_comment1['neg'] < 0.49) {
            $mood_comment1 = 'Negative ';
        } elseif ($output_text_comment1['neg'] > 0.49) {
            $mood_comment1 = 'Negative';
        }

        if ($output_text_comment1['pos'] > 0 && $output_text_comment1['pos'] < 0.49) {
            $mood_comment1 = 'Positive ';
        } elseif ($output_text_comment1['pos'] > 0.49) {
            $mood_comment1 = 'Positive';
        }

        if ($output_text_comment2['neg'] > 0 && $output_text_comment2['neg'] < 0.49) {
            $mood_comment2 = 'Negative ';
        } elseif ($output_text_comment2['neg'] > 0.49) {
            $mood_comment2 = 'Negative';
        }

        if ($output_text_comment2['pos'] > 0 && $output_text_comment2['pos'] < 0.49) {
            $mood_comment2 = 'Positive ';
        } elseif ($output_text_comment2['pos'] > 0.49) {
            $mood_comment2 = 'Positive';
        }


        Feedback::create([
            "user_id" => $request->user_id,
            "cart_id" => $request->cart_id,
            "comment_1" => $request->comment_1,
            "comment_2" => $request->comment_2,
            "sentiment_1" => $mood_comment1,
            "sentiment_2" => $mood_comment2,
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

        $user = Auth::user();

        // Ensure the user is a vendor
        if ($user->vendor !== 1) {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        $storeName = $user->role;


        if ($user->role == 'vendor-ke') {
            $storeName = "Kitchen Express";
            $bg = "images/kexpresscaf.png";
            $logo = "images/kitchenexpress.png";
        } elseif ($user->role == 'vendor-lm') {
            $storeName = "La Mudras Corner";
            $bg = "images/lmbg.png";
            $logo = "images/La Mudras Corner.png";
        }


        $user = Auth::user()->role;
        if ($user == "vendor-ke") {
            $cartitems = Order_product::join("product", "product.id", "=", "order_product.product_id")->join("cart", "cart.id", "=", "order_product.cart_id")->where("cart_status", "paid")->where("store", "Kitchen Express")->get();
            $cart = Cart::where("cart_status", "paid")->where("store", "Kitchen Express")->get();

            $cartitems_claimed = Order_product::join("product", "product.id", "=", "order_product.product_id")->join("cart", "cart.id", "=", "order_product.cart_id")->where("cart_status", "claimed")->where("store", "Kitchen Express")->get();
            $cart_claimed = Cart::where("cart_status", "claimed")->where("store", "Kitchen Express")->get();

            $productlist = Product::where("store_name", "Kitchen Express")->where('isactive', 1)->get();
            return view("vorders", [
                "product_list" => $productlist,
                "product" => $cartitems,
                "cart" => $cart,
                "product_claimed" => $cartitems_claimed,
                "cart_claimed" => $cart_claimed,
                "storename" => $storeName,
                "bg" => $bg,
                "logo" => $logo

            ]);
        }
        if ($user == "vendor-rb") {
            $cartitems = Order_product::join("product", "product.id", "=", "order_product.product_id")->join("cart", "cart.id", "=", "order_product.cart_id")->where("cart_status", "paid")->where("store", "Red Brew")->get();
            $cart = Cart::where("cart_status", "paid")->where("store", "Red Brew")->get();

            $cartitems_claimed = Order_product::join("product", "product.id", "=", "order_product.product_id")->join("cart", "cart.id", "=", "order_product.cart_id")->where("cart_status", "claimed")->where("store", "Red Brew")->get();
            $cart_claimed = Cart::where("cart_status", "claimed")->where("store", "Red Brew")->get();

            $productlist = Product::where("store_name", "Red Brew")->where('isactive', 1)->get();
            return view("vorders", [
                "product_list" => $productlist,
                "product" => $cartitems,
                "cart" => $cart,
                "product_claimed" => $cartitems_claimed,
                "cart_claimed" => $cart_claimed,
                "storename" => $storeName,
                "bg" => $bg,
                "logo" => $logo

            ]);
        }
        if ($user == "vendor-lm") {
            $cartitems = Order_product::join("product", "product.id", "=", "order_product.product_id")->join("cart", "cart.id", "=", "order_product.cart_id")->where("cart_status", "paid")->where("store", "La Mudras Corner")->get();
            $cart = Cart::where("cart_status", "paid")->where("store", "La Mudras Corner")->get();

            $cartitems_claimed = Order_product::join("product", "product.id", "=", "order_product.product_id")->join("cart", "cart.id", "=", "order_product.cart_id")->where("cart_status", "claimed")->where("store", "La Mudras Corner")->get();
            $cart_claimed = Cart::where("cart_status", "claimed")->where("store", "La Mudras Corner")->get();

            $productlist = Product::where("store_name", "La Mudras Corner")->where('isactive', 1)->get();
            return view("vorders", [
                "product_list" => $productlist,
                "product" => $cartitems,
                "cart" => $cart,
                "product_claimed" => $cartitems_claimed,
                "cart_claimed" => $cart_claimed,
                "storename" => $storeName,
                "bg" => $bg,
                "logo" => $logo

            ]);
        }
    }

    public function completeorder()
    {
        $cartitems = Order_product::join("product", "product.id", "=", "order_product.product_id")->join("cart", "cart.id", "=", "order_product.cart_id")->where("user_id", Auth::user()->id)->where("cart_status", "claimed")->get();
        $cart = Cart::where("cart_status", "claimed")->get();

        return view("vorders", ["product" => $cartitems, "cart" => $cart]);
    }

    public function updatestock($adj, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            toast('Product not found', 'error');
            return redirect()->route("vieworders");
        }

        $stock = $product->stocks;

        if ($adj == "+" && $stock >= 0) {
            $product->update([
                "stocks" => $stock + 1
            ]);
            toast('Added item successfully', 'success');
        } elseif ($adj == "-" && $stock > 0) {
            $product->update([
                "stocks" => $stock - 1
            ]);
            toast('Deducted item successfully', 'success');
        } else {
            toast('Out of stock', 'error');
        }

        return redirect()->route("vieworders");
    }

    public function editmenu()
    {
        $user = Auth::user();

        // Ensure the user is a vendor
        if ($user->vendor !== 1) {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        $storeName = $user->role;


        if ($user->role == 'vendor-ke') {
            $storeName = "Kitchen Express";
            $bg = "images/kexpresscaf.png";
            $logo = "images/kitchenexpress.png";
        } elseif ($user->role == 'vendor-lm') {
            $storeName = "La Mudras Corner";
            $bg = "images/lmbg.png";
            $logo = "images/La Mudras Corner.png";
        }

        $user = Auth::user()->role;
        if ($user == "vendor-ke") {
            $productlist = Product::where("store_name", "Kitchen Express")->get();
            return view("veditmenu", [
                "product_list" => $productlist,
                "storename" => $storeName,
                "bg" => $bg,
                "logo" => $logo
            ]);
        }
        if ($user == "vendor-lm") {
            $productlist = Product::where("store_name", "La Mudras Corner")->get();
            return view("veditmenu", [
                "product_list" => $productlist,
                "storename" => $storeName,
                "bg" => $bg,
                "logo" => $logo
            ]);
        }
        if ($user == "vendor-rb") {
            $productlist = Product::where("store_name", "Red Brew")->get();
            return view("veditmenu", [
                "product_list" => $productlist,
                "storename" => $storeName,
                "bg" => $bg,
                "logo" => $logo
            ]);
        }
    }

    public function feedbackview($cartid)
    {
        return view("feedback", ['cartid' => $cartid, "user_id" => Auth::user()->id]);
    }

    public function vendorfeedbacks()
    {
        $user = Auth::user();

        // Ensure the user is a vendor
        if ($user->vendor !== 1) {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        $storeName = $user->role;


        if ($user->role == 'vendor-ke') {
            $storeName = "Kitchen Express";
            $bg = "images/kexpresscaf.png";
            $logo = "images/kitchenexpress.png";
        } elseif ($user->role == 'vendor-lm') {
            $storeName = "La Mudras Corner";
            $bg = "images/lmbg.png";
            $logo = "images/La Mudras Corner.png";
        }

        $user = Auth::user()->role;
        if ($user == "vendor-ke") {
            $feedbacklist = Feedback::join('cart', 'cart.id', '=', 'feedback.cart_id')->select('feedback.*', 'cart.store')->where('store', 'Kitchen Express')->get();
            return view("vviewfeedback", [
                "feedbacklist" => $feedbacklist,
                "storename" => $storeName,
                "bg" => $bg,
                "logo" => $logo
            ]);
        }
        if ($user == "vendor-rb") {
            $feedbacklist = Feedback::join('cart', 'cart.id', '=', 'feedback.cart_id')->select('feedback.*', 'cart.store')->where('store', 'Red Brew')->get();
            return view("vviewfeedback", [
                "feedbacklist" => $feedbacklist,
                "storename" => $storeName,
                "bg" => $bg,
                "logo" => $logo
            ]);
        }
        if ($user == "vendor-lm") {
            $feedbacklist = Feedback::join('cart', 'cart.id', '=', 'feedback.cart_id')->select('feedback.*', 'cart.store')->where('store', 'La Mudras Corner')->get();
            return view("vviewfeedback", [
                "feedbacklist" => $feedbacklist,
                "storename" => $storeName,
                "bg" => $bg,
                "logo" => $logo
            ]);
        }
        if ($user == "admin") {
            $feedbacklist = Feedback::join('cart', 'cart.id', '=', 'feedback.cart_id')->select('feedback.*', 'cart.store')->get();
            return view("viewfeedbacks", [
                "feedbacklist" => $feedbacklist,
            ]);
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
        if(Product::where('productname',$request->productname)->exists()){
            toast('This item already exists', 'error');
            return redirect()->route("editmenu");
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
        // Get monthly sales
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $monthlySales_ke = DB::table('order_product')
            ->join('product', 'product.id', '=', 'order_product.product_id')
            ->whereBetween('order_product.created_at', [$startOfMonth, $endOfMonth])
            ->sum('product_total');

        $monthlySales_lm = DB::table('order_product')
            ->join('product', 'product.id', '=', 'order_product.product_id')
            ->whereBetween('order_product.created_at', [$startOfMonth, $endOfMonth])
            ->sum('product_total');

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

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $productlist_month_ke = DB::table('order_product')
            ->join('product', 'product.id', '=', 'order_product.product_id')
            ->select(
                'productname',
                'price',
                DB::raw('count(*) as productsold'),
                DB::raw('SUM(product_total * product_quantity) as total')
            )
            ->whereBetween('order_product.created_at', [$startOfMonth, $endOfMonth])
            ->where('store_name', 'Kitchen Express')
            ->groupBy('productname', 'price')
            ->get();

        $productlist_month_lm = DB::table('order_product')
            ->join('product', 'product.id', '=', 'order_product.product_id')
            ->select(
                'productname',
                'price',
                DB::raw('count(*) as productsold'),
                DB::raw('SUM(product_total * product_quantity) as total')
            )
            ->whereBetween('order_product.created_at', [$startOfMonth, $endOfMonth])
            ->where('store_name', 'La Mudras Corner')
            ->groupBy('productname', 'price')
            ->get();

        return view('viewreports', [
            "product_month_ke" => $productlist_month_ke,
            "product_month_lm" => $productlist_month_lm,
            "product" => $productlist,
            'monthly_sales_ke' => $monthlySales_ke,
            'monthly_sales_lm' => $monthlySales_lm,
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