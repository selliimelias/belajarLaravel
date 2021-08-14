<?php

namespace App\Http\Controllers;

use App\Models\Kurir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kurir = Kurir::all();
        // return $kurir;
        return view('kurir.index', compact('kurir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kurir.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  return $request;
         $request->validate(
            [
                'kurir' => 'required|min:3|max:25',
                'ongkir' => 'required|numeric'
            ],
            [
                'kurir.required' => 'Kolom Nama Harus Diisi',
                'kurir.min' => 'Isi harus lebih dari 1 karakter',
                'kurir.max' => 'Isi harus kurang dari 25 karakter',
                'ongkos.required' => 'Kolom Harga Harus Diisi'
            ]
        );

        
        Kurir::create(
        [
            'nama_kurir' => $request->kurir,
            'ongkir' => $request->ongkir
        ]);
        return redirect('/kurir')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function show(Kurir $kurir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function edit(Kurir $kurir)
    {
        // return $kurir;
        return view('kurir.edit', compact('kurir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kurir $kurir)
    {
         // return $request;
         $request->validate(
        [
            'kurir' => 'required|min:3|max:25',
            'ongkir' => 'required|numeric'
        ],
        [
            'kurir.required' => 'Kolom Nama Harus Diisi',
            'kurir.min' => 'Isi harus lebih dari 1 karakter',
            'kurir.max' => 'Isi harus kurang dari 25 karakter',
            'ongkos.required' => 'Kolom Harga Harus Diisi'
        ]);

        Kurir::where('id', $kurir->id)->update([
            'nama_kurir' => $request->kurir,
            'ongkir' => $request->ongkir
        ]);
        return redirect('/kurir')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kurir $kurir)
    {
        Kurir::destroy('id', $kurir->id);
        return redirect('/kurir')->with('status', 'Berhasil Dihapus');
    }
}
