<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(6);
        return view('home.userpage', compact('product'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_user = User::all()->count();
            $order = Order::all();
            $total_revenue = 0;
            foreach ($order as $order) {
                $total_revenue = $total_revenue + $order->price;
            }
            $total_delivered = Order::where('delivery_status', '=', 'delivered')->get()->count();
            $total_processing = Order::where('delivery_status', '=', 'processing')->get()->count();

          
            $data = [];
            for ($i = 1; $i <= 12; $i++) {
                $data[] = Order::whereMonth('created_at', $i)->count();
            }
        

            return view('admin.home', compact('data','total_product', 'total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_processing'));
        } else {
            $product = Product::paginate(8);
            return view('home.userpage', compact('product'))->with('i', (request()->input('page', 1) - 1) * 3);
        }
    }

    public function produk()
    {
        $product = Product::paginate();
        return view('home.produk', compact('product'));
    }
    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);

            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;
            if ($product->discount_price != null) {
                $cart->price = $product->discount_price * $request->jubel;
            } else {
                $cart->price = $product->price * $request->jubel;
            }
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->jubel =  $request->jubel;

            if ($product->quantity < $request->jubel){
                Alert::warning('Gagal Ditambahkan','Produk habis atau Produk tidak mencukupi ');
                return redirect()->back();
            }else{
                $product->quantity = $product->quantity - $request->jubel;
    
                $cart->save();
                $product->update();
                Alert::success('Produk Berhasil Ditambahkan','Produk Telah Ditambahkan Ke Keranjang');
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function show_cart()
    {
        if (Auth::id()) {

            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            return view('home.showcart', compact('cart'));
        } else {
            return redirect('login');
        }
    }

    public function show_order()
    {
        if (Auth::id()) {

            $user = Auth::user();
            $userid = $user->id;
            $order = Order::where('user_id', '=', $userid)->get();
            return view('home.order', compact('order'));
        } else {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart = cart::find($id);
        $product = product::find($cart->product_id);
        $product->quantity = $product->quantity + $cart->jubel;
        $product->update();
        $cart->delete();
        Alert::success('Produk Berhasil Dihapus','Anda telah menghapus produk dari keranjang');
        return redirect()->back();
    }

    public function cancel_order($id)
    {
        $order = Order::find($id);
        $product = product::find($order->product_id);
        $product->quantity = $product->quantity + $order->jubel;
        $product->update();
        $order->delete();
        Alert::success('Produk Berhasil Dihapus','Anda telah menghapus produk dari Pesanan');
        return redirect()->back();
    }

    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = Cart::where('user_id', '=', $userid)->get();

        foreach ($data as $data) {
            $order = new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->jubel = $data->jubel;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->delivery_status = 'processing';
            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
        Alert::success('Produk Berhasil Ditambahkan','Produk Telah Ditambahkan Ke Pesanan');
        return redirect()->back();
    }

    public function product_search(Request $request)
    {
        $searchtext = $request->search;
        $product = Product::where('title', 'LIKE', "%$searchtext%")->paginate(8);
        return view('home.userpage', compact('product'));
    }
    public function produk_search(Request $request)
    {
        $searchtext = $request->search;
        $product = Product::where('title', 'LIKE', "%$searchtext%")->paginate(8);
        return view('home.produk', compact('product'));
    }

    public function products()
    {
        $product = Product::paginate(8);
        return view('home.all_product', compact('product'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
