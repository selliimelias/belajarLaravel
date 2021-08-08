<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prov = State::all();
        // return $state;
        return view('state.index', compact('prov'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('state.add');
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
                'prov' => 'required|min:3|max:25'
            ],
            [
                'prov.required' => 'Kolom prov Harus Diisi',
                'prov.min' => 'Isi harus lebih dari 3 karakter',
                'prov.max' => 'Isi harus kurang dari 25 karakter'
            ]
        );

        State::create([
            'nama' => $request->prov
        ]);
        return redirect('/state')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        return view('state.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        // return $request;
        $request->validate([
            'prov' => 'required|min:3|max:25'
        ],
        [
            'prov.required' => 'Kolom prov Harus Diisi',
            'prov.min' => 'Isi harus lebih dari 3 karakter',
            'prov.max' => 'Isi harus kurang dari 25 karakter'
        ]);

        State::where('id', $state->id)->update([
            'nama' => $request->prov
        ]);
        return redirect('/state')->with('status', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        State::destroy('id', $state->id);
        return redirect('/state')->with('status', 'Berhasil Dihapus');
    }
}
