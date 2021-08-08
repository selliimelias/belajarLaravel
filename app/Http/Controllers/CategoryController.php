<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Category::all();
        // return $kategory;
        return view('category.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.add');
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
                'icon' => 'required',
                'kategori' => 'required|min:3|max:25'
            ],
            [
                'kategori.required' => 'Kolom Kategori Harus Diisi',
                'kategori.min' => 'Isi harus lebih dari 3 karakter',
                'kategori.max' => 'Isi harus kurang dari 25 karakter'
            ]
        );

        $img = $request->file('icon');
        $nama_file = time(). "_". $img->getClientOriginalName();
        $img->move('dist/img', $nama_file); //proses upload foto ke directory Laravel

        Category::create([
            'icon' => $nama_file,
            'nama' => $request->kategori
        ]);
        return redirect('/category')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // return $category;
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // return $request;
        $request->validate([
            'kategori' => 'required|min:3|max:25'
        ],
        [
            'kategori.required' => 'Kolom Kategori Harus Diisi',
            'kategori.min' => 'Isi harus lebih dari 3 karakter',
            'kategori.max' => 'Isi harus kurang dari 25 karakter'
        ]);

        $img = $request->file('icon');
        $nama_file = time(). "_". $img->getClientOriginalName();
        $img->move('dist/img', $nama_file); //proses upload foto ke directory Laravel

        Category::where('id', $category->id)->update([
            'icon' => $nama_file,
            'nama' => $request->kategori
        ]);
        return redirect('/category')->with('status', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy('id', $category->id);
        return redirect('/category')->with('status', 'Berhasil Dihapus');
    }
}
