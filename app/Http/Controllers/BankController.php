<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uang = Bank::all();
        // return $bank;
        return view('bank.index', compact('uang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request
        $request->validate(
            [
                'rek' => 'required|numeric|min:1',
                'uang' => 'required|min:3|max:25'
            ],
            [
                'rek.required' => 'Kolom rekening Harus Diisi',
                'rek.min' => 'Isi harus lebih dari 1 karakter',
                'rek.max' => 'Isi harus kurang dari 25 karakter',
                'uang.required' => 'Kolom bank Harus Diisi',
                'uang.min' => 'Isi harus lebih dari 3 karakter',
                'uang.max' => 'Isi harus kurang dari 25 karakter'
            ]
        );

        
            Bank::create([
            'no_rek' => $request->rek,
            'nama_bank' => $request->uang
        ]);
        return redirect('/bank')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        // return $bank;
        return view('bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        // return $request;
        $request->validate([
            'rek' => 'required|numeric|min:1',
            'uang' => 'required|min:3|max:25'
        ],
        [
            'rek.required' => 'Kolom rekening Harus Diisi',
            'rek.min' => 'Isi harus lebih dari 3 karakter',
            'rek.max' => 'Isi harus kurang dari 25 karakter',
            'uang.required' => 'Kolom bank Harus Diisi',
            'uang.min' => 'Isi harus lebih dari 3 karakter',
            'uang.max' => 'Isi harus kurang dari 25 karakter'
        ]);

        Bank::where('id', $bank->id)->update([
            'rek' => $request->rek,
            'uang' => $request->uang
        ]);
        return redirect('/bank')->with('status', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        Bank::destroy('id', $bank->id);
        return redirect('/bank')->with('status', 'Berhasil Dihapus');
    }
}
