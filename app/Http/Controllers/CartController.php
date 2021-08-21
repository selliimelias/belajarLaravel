<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Kurir;
use App\Models\Bank;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::where('status', 0)->where('user_id', Auth::user()->id)->get();
        // return $cart;
        $subtotal = Cart::where('status', 0)->sum('subtotal');
        $kurir = Kurir::all();
        $bank = Bank::all();
        $number = Number::where('id', 1)->get();
        $angka = ($number[0]->angka)+1;
        $date = date('dmY');
        $invoice = "INV-PK-$date-$angka";
        return view('keranjang.index', compact('cart', 'subtotal', 'kurir', 'bank'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cart.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'qty' => 'required|numeric|min:1'
            ],
            [
                'qty.required' => 'Kolom Kuantiti Harus Diisi',
                'qty.min' => 'Harus diisi!'
            ]
        );

        $product = Product::where('id', $request->product_id)->get();
        $total = $product[0]->harga_barang * $request->qty;
        $keranjang = Cart::where('user_id', Auth::user()->id)
        ->where('status', 0)->get();

        foreach($keranjang as $item)
        {
            if($request->product_id == $item->product_id)
            {
                Cart::where('product_id', $item->product_id)->update([
                    'qty' => $item->qty + $request->qty
                ]);
                return redirect()->back();
            }
        }

        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'subtotal' => $total,
            'status' => 0
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        Cart::destroy('id', $cart->id);
        return redirect('/cart')->with('status', 'Berhasil Dihapus');
    }
}
