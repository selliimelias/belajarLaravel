<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::all();
        // return $city;
        return view('city.index', compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state= State::all();
        return view('city.add', compact('state'));
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
                'state' => 'required',
                'kota' => 'required|min:3|unique:products,nama_barang'
            ],
            [
                'state.required' => 'Kolom State Harus Diisi',
                'state.min' => 'Isi harus lebih dari 3 karakter',
                'state.max' => 'Isi harus kurang dari 25 karakter',
                'kota.required' => 'Nama Harus Diisi',
                'kota.min' => 'Nama harus lebih dari 3 karakter',
                'kota.unique' => 'Nama telah ada!'
            ]
        );

        // $img = $request->file('photo');
        // $nama_file = time(). "_". $img->getClientOriginalName();
        // $img->move('dist/img', $nama_file); //proses upload foto ke directory Laravel

        //untuk memasukkan data ke table
        City::create([
            'state_id' => $request->state,
            'city' => $request->kota
        ]);

        return redirect('/city')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $state= State::all();
        return view('city.edit', compact('state', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        // return $request;
        $request->validate(
            [
                'state' => 'required',
                'kota' => 'required|min:3|max:25'
            ],
            [
                'state.required' => 'Kolom Kategori Harus Diisi',
                'state.min' => 'Isi harus lebih dari 3 karakter',
                'state.max' => 'Isi harus kurang dari 25 karakter',
                'kota.required' => 'Nama Harus Diisi',
                'kota.min' => 'Nama harus lebih dari 3 karakter',
                'kota.max' => 'Nama harus kurang dari 25 karakter'
            ]
        );

        //untuk memasukkan data ke table
        City::where('id', $city->id)->update([
            'state_id' => $request->state,
            'city' => $request->kota
        ]);

        // Photo::where('product_id', $product->id)->update([
        //     'nama_photo' => $nama_file,
        //     // 'status' => $request->status,
        //     'product_id' => $product->id
        // ]);

        return redirect('/city')->with('status', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        City::destroy('id', $city->id);
        return redirect('/city')->with('status', 'Berhasil Dihapus');
    }
}
