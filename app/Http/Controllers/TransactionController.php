<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                'kurir_id' => 'required',
                'bank_id' => 'required|numeric',
                'no_invoice' => 'required|numeric',
                'alamat' => 'required'
            ],
            [
                'kurir_id.required' => 'Kolom Harus Diisi',
                'bank_id.required' => 'Kolom Harus Diisi',
                'no_invoice' => 'Kolom Harus Diisi',
                'alamat' => 'Kolom Harus Diisi'
            ]
        );

        Transaction::create([
            'kurir_id' => $request->kurir_id,
            'bank_id' => $request->bank_id,
            'no_invoice' => $request->no_invoice,
            'alamat' => $request->alamat
        ]);

        return redirect('/transaction')->with('status', 'Berhasil Diubah');
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
        //
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
    public function update(Request $request, $id)
    {
        //
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
}
