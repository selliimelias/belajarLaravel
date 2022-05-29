<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Notification;
use App\Models\Transaction;
use App\Models\Number;
use App\Models\Product;
use App\Mail\KirimEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::all();
        return view('transaction.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'kurir' => 'required',
                'bank' => 'required|numeric',
                'alamat' => 'required'
            ],
            [
                'kurir.required' => 'Kolom Harus Diisi',
                'bank.required' => 'Kolom Harus Diisi',
                'alamat' => 'Kolom Harus Diisi'
            ]
        );

        $number = Number::where('id', 1)->get();
        $angka = ($number[0]->angka)+1;
        $date = date('dmY');
        $invoice = "INV-PK-$date-$angka";
        Number::where('id', 1)->update(['angka'=>$angka]);

        Transaction::create([
            'no_invoice' => $invoice,
            'kurir_id' => $request->kurir,
            'bank_id' => $request->bank,
            'alamat' => $request->alamat,
            'total' => $request->subtotal,
            'status_transaction' => 'unpaid',
            'user_id' => Auth::user()->id
        ]);
        
        $ongkir = DB::table('kurirs')
        ->select('kurirs.*', 'transactions.*')
        ->join('transactions', 'kurirs.id', '=', 'transactions.kurir_id')
        ->where('kurirs.id', $request->kurir)
        ->get();

        $transaction = Transaction::where('no_invoice', $invoice)->first();
        Cart::where('user_id', Auth::user()->id)
        ->where('status', 0)
        ->update([
            'transaction_id' => $transaction->id,
            // 'status' => 1
        ]);

        $keranjang = Cart::where('user_id', Auth::user()->id)
        ->where('status', 0)
        ->get();
        foreach($keranjang as $item)
        {
            $product = Product::where('id', $item->product_id)->first();
            Product::where('id', $item->product_id)->update([
                'stok_barang' => $product->stok_barang - $item->qty,
                'terjual' => $product->terjual + $item->qty
            ]);
        }
        
        $nama = Auth::user()->name;

        $keranjang = Cart::where('user_id', Auth::user()->id)
        ->where('status', 0)
        ->get();

        Notification::create([
            'user_id' => Auth::user()->id,
            'isi' => 'Hai '. $nama .', Silakan selesaikan Pembayaran Rp. '. $transaction->total .' dengan No. Pesanan '. $transaction->no_invoice,
            'title' => 'Silakan Lakukan Pembayaran'
        ]);

        $isi = [
            'invoice' => $transaction -> no_invoice,
            'nama' => $nama,
            'alamat' => $transaction -> alamat,
            'bank' => $transaction -> bank -> nama_bank,
            'no_rek' => $transaction -> bank -> no_rek,
            'keranjang' => $keranjang,
            'ongkir' => $transaction -> kurir -> ongkir,
            'total' => $transaction -> total
        ];

        Mail::to(Auth::user()->email)->send(new \App\Mail\KirimEmail($isi));

        Cart::where('user_id', Auth::user()->id)
        ->where('status', 0)
        ->update([
            'status' => 1
        ]);

        return redirect('/transaction/' .$transaction->id)->with('status', 'Berhasil Diubah');
        // $data = Transaction::where('nama_barang', $request->name)->get();
        // dd($data);
        // return view('product.addPhoto', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::where('id', $id)->get();
        // return $transaction;
        return view('payment.index', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $img = $request->file('struk');
        $nama_file = time(). "_". $img->getClientOriginalName();
        $img->move('public/dist/img', $nama_file); //proses upload foto ke directory Laravel

        Transaction::where('id', $transaction->id)
        ->update
        ([
            'struk' => $nama_file
        ]);

        return redirect('/')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sukses(){
        return view('payment/sukses');
        // return 'sukses';
    }

    public function paid(Transaction $transaction){
        $status=$transaction->status_transaction=='unpaid' ? 'paid' : 'unpaid';
        Transaction::where('id', $transaction->id)->update(['status_transaction'=>$status]);
        
        $nama = $transaction->user->name;

        Notification::create([
            'user_id' => $transaction -> user_id,
            'isi' => 'Hai '. $nama .', Terimakasih telah membayar sebesar Rp. '. $transaction->total .' dengan No. Pesanan '. $transaction->no_invoice,
            'title' => 'Pembayaran Telah Terverifikasi'
        ]);
        
        $keranjang = Cart::where('user_id', $transaction->user->id)
        ->where('status', 0)
        ->get();

        $isi = [
            'invoice' => $transaction -> no_invoice,
            'nama' => $nama,
            'alamat' => $transaction -> alamat,
            'bank' => $transaction -> bank -> nama_bank,
            'no_rek' => $transaction -> bank -> no_rek,
            'keranjang' => $keranjang,
            'ongkir' => $transaction -> kurir -> ongkir,
            'total' => $transaction -> total
        ];

        Mail::to($transaction->user->email)->send(new \App\Mail\KirimEmail($isi));

        return redirect()->back();
    }
}