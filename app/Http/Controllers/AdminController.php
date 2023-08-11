<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Catagory;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data = Catagory::all();
        return view('admin.catagory', compact('data'));
    }

    public function add_catagory(Request $request)
    {
        $data = new Catagory;

        $data->catagory_name = $request->catagory;
        $data->save();
        Alert::success('Berhasil', 'Tambah Data Kategori Berhasil');
        return redirect()->back();
    }

    public function delete_catagory($id)
    {
        $data = Catagory::find($id);

        $data->delete();
        Alert::success('Berhasil', 'Hapus Data Kategori Berhasil');
        return redirect()->back()->with('message', 'Catagory Deleted Succesfully');
    }

    public function view_product()
    {
        $catagory = Catagory::all();
        return view('admin.product', compact('catagory'));
    }

    public function add_product(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->dis_price;
        $product->catagory = $request->catagory;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;


        $product->save();
        Alert::success('Berhasil', 'Produk Telah Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function show_product()
    {
        $product = Product::all();
        return view('admin.show_product', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        File::delete(public_path('product' . '/' . $product->image));

        Product::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil hapus data');
    }

    public function update_product($id)
    {
        $product = Product::find($id);
        $catagory = Catagory::all();
        return view('admin.update_product', compact('product', 'catagory'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        $product->catagory = $request->catagory;
        $product->quantity = $request->quantity;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }

        $product->save();

        Alert::success('Berhasil', 'Produk Berhasil Diedit');
        return redirect()->back();

        return view('admin.update_product', compact('product', 'catagory'));
    }

    public function order()
    {
        $order = Order::all();
        return view('admin.order', compact('order'));
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "delivered";
        $order->save();
        return redirect()->back();
    }

    public function print_pdf($id)
    {
        $order = Order::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('order'));
        return $pdf->download('order_details.pdf');
    }

    public function searchdata(Request $request)
    {
        $searchtext = $request->search;
        $order = Order::where('name', 'LIKE', "%$searchtext%")->orwhere('product_title', 'LIKE', "%$searchtext%")->get();
        return view('admin.order', compact('order'));
    }

    
}
