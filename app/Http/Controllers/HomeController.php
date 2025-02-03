<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Promotion;
use App\Models\Contact;


use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use Stripe;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype', 'user')->get()->count();

        $product = Product::all()->count();

        $order = Order::all()->count();

        $delivered = Order::where('status', 'Delivered')->get()->count();
       return view('admin.index', compact('user', 'product', 'order', 'delivered')); 
    }

    public function home()
    {
    //display product data
    $product = Product::all();

    //get active promotions
    $promotions = Promotion::where('is_active', 1)->get();

    if(Auth::id())
    {
        $user = Auth::user();
        $userid = $user->id; //get from user table
        
        $count = Cart::where('user_id', $userid )->count();
    }
    else {
        
            $count = '';
        
    }

            return view('home.index', compact('product', 'count', 'promotions'));
    }

    public function login_home()
    {
        //get active promotions
    $promotions = Promotion::where('is_active', 1)->get();

         //display product data
    $product = Product::all();

    if(Auth::id())
    {
        $user = Auth::user();
        $userid = $user->id; //get from user table
        
        $count = Cart::where('user_id', $userid )->count();
    }
    else {
        
            $count = '';
        
    }

    return view('home.index', compact('product', 'count', 'promotions'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id; //get from user table
            
            $count = Cart::where('user_id', $userid )->count();
        }
        else {
            
                $count = '';
            
        }

        return view('home.product_details', compact('data', 'count'));
    }

    public function add_cart($id)
        {
            $product_id = $id;
            $user = Auth::user();
            $user_id = $user->id;

            $data = new Cart;
            $data->user_id = $user_id;
            $data->product_id = $product_id;

            $data->save();

            toastr()->timeout(5000)->closeButton()->addSuccess('Product Added to Cart!');

            return redirect()->back();

        }

    public function mycart()
    {
        if(Auth::id())
        {
            $user = Auth::user(); //get user login data assign to $user variable

            $user_id = $user->id; //retrieve user id, assign to $user_id

            $count = Cart::where('user_id', $user_id)->count();

            //sql query from cart table(specific data for specific user id)
            $cart = Cart::where('user_id', $user_id)->get(); 

        }
        return view('home.mycart', compact('count', 'cart'));
    }

    public function delete_cart($id)
    {
        $data = Cart::find($id);

        $data->delete();

        toastr()->timeout(5000)->closeButton()->timeout(5000)->success('Product Deleted Successfully from Your Cart.');

        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userId = Auth::user()->id;
        $cart = Cart::where('user_id', $userId)->get(); //get all data from cart table where user_id = $userId

        foreach($cart as $carts)
        {
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userId;
            $order->product_id = $carts->product_id;
            $order->save();

        }

        $cart_remove = Cart::where('user_id', $userId)->get();

        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);
            $data->delete();
        }

        toastr()->timeout(5000)->closeButton()->timeout(5000)->success('Product Ordered Successfully.');
        
        return redirect()->back();
    }    

    public function my_orders()
    {
        $user = Auth::user()->id;
        $count = Cart::where('user_id', $user)->get()->count();

        $order = Order::where('user_id', $user)->get();

        return view('home.order', compact('count', 'order'));
    }

    public function stripe($value): View
    {
        return view('home.stripe', compact('value'));
    }
      
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request, $value): RedirectResponse
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      
        Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "test laravel" 
        ]);
                
         $name = Auth::user()->name;
        $address = Auth::user()->address;
        $phone = Auth::user()->phone;
        $userId = Auth::user()->id;
        $cart = Cart::where('user_id', $userId)->get(); //get all data from cart table where user_id = $userId

        foreach($cart as $carts)
        {
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userId;
            $order->product_id = $carts->product_id;
            $order->payment_status = "Credit Card";
            $order->save();

        }

        $cart_remove = Cart::where('user_id', $userId)->get();

        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);
            $data->delete();
        }

        toastr()->timeout(5000)->closeButton()->timeout(5000)->success('Product Ordered Successfully.');
        
        return redirect('mycart');
    }

    public function shop()
    {
         //display product data
    $product = Product::all();

    if(Auth::id())
    {
        $user = Auth::user();
        $userid = $user->id; //get from user table
        
        $count = Cart::where('user_id', $userid )->count();
    }
    else {
        
            $count = '';
        
    }

            return view('home.shop', compact('product', 'count'));
    }

    public function add_contact(Request $request)
    {
        // dd(session()->all());
        $data = new Contact;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->message = $request->message;

        $data->save();
        // dd($data);

        toastr()->timeout(5000)->closeButton()->timeout(5000)->success('Message Sent Successfully.');

        return redirect()->back();
    }

   
}
