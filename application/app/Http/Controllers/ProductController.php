<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category= Category::all();
        return view('product.add', compact('category'));
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
                'category' => 'required',
                'name' => 'required|min:3|unique:products,nama_barang',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required|min:3'
            ],
            [
                'category.required' => 'Kolom Kategori Harus Diisi',
                'category.min' => 'Isi harus lebih dari 3 karakter',
                'category.max' => 'Isi harus kurang dari 25 karakter',
                'name.required' => 'Nama Harus Diisi',
                'name.min' => 'Nama harus lebih dari 3 karakter',
                'harga.required' => 'Harga Harus Diisi',
                'stok.required' => 'Stok Harus Diisi',
                'deskripsi.required' => 'Deskripsi Harus Diisi',
                'deskripsi.min' => 'Isi harus lebih dari 3 karakter',
                'name.unique' => 'Nama telah ada!'
            ]
        );

        // $img = $request->file('photo');
        // $nama_file = time(). "_". $img->getClientOriginalName();
        // $img->move('dist/img', $nama_file); //proses upload foto ke directory Laravel

        //untuk memasukkan data ke table
        Product::create([
            'category_id' => $request->category,
            'nama_barang' => $request->name,
            'harga_barang' => $request->harga,
            'stok_barang' => $request->stok,
            'deskripsi_barang' => $request->deskripsi
        ]);

        $data = Product::where('nama_barang', $request->name)->get();
        // dd($data);
        return view('product.addPhoto', compact('data'));
        // return redirect('/product')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category= Category::all();
        return view('product.edit', compact('category', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // return $request;
        $request->validate(
            [
                'photo' => 'required',
                'category' => 'required',
                'name' => 'required|min:3|max:25',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required|min:3|max:100'
            ],
            [
                'category.required' => 'Kolom Kategori Harus Diisi',
                'category.min' => 'Isi harus lebih dari 3 karakter',
                'category.max' => 'Isi harus kurang dari 25 karakter',
                'name.required' => 'Nama Harus Diisi',
                'name.min' => 'Nama harus lebih dari 3 karakter',
                'name.max' => 'Nama harus kurang dari 25 karakter',
                'harga.required' => 'Harga Harus Diisi',
                'stok.required' => 'Stok Harus Diisi',
                'deskripsi.required' => 'Deskripsi Harus Diisi',
                'deskripsi.min' => 'Isi harus lebih dari 3 karakter',
                'deskripsi.max' => 'Isi harus kurang dari 25 karakter'
            ]
        );

        $img = $request->file('photo');
        $nama_file = time(). "_". $img->getClientOriginalName();
        $img->move('dist/img', $nama_file); //proses upload foto ke directory Laravel

        //untuk memasukkan data ke table
        Product::where('id', $product->id)->update([
            'category_id' => $request->category,
            'nama_barang' => $request->name,
            'harga_barang' => $request->harga,
            'stok_barang' => $request->stok,
            'deskripsi_barang' => $request->deskripsi
        ]);

        Photo::where('product_id', $product->id)->update([
            'nama_photo' => $nama_file,
            // 'status' => $request->status,
            'product_id' => $product->id
        ]);

        return redirect('/product')->with('status', 'Berhasil Diubah');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy('id', $product->id);
        return redirect('/product')->with('status', 'Berhasil Dihapus');
    }

    public function createPhoto()
    {
        return view('product.addPhoto');
    }

    public function storePhoto(Request $request)
    {
        $img = $request->file('photo');
        $nama_file = time(). "_". $img->getClientOriginalName();
        $img->move('dist/img', $nama_file); //proses upload foto ke directory Laravel

        Photo::create([
            'nama_photo' => $nama_file,
            // 'status' => $request->status,
            'product_id' => $request->id
        ]);

        return redirect('/product')->with('status', 'Berhasil Ditambahkan');
    }

    public function promo(Product $product)
    {
        // if($product->promo==1)
        // {
        //     $promo=0;
        // }
        // else
        // {
        //     $promo=1;
        // }
        $promo=$product->promo==1 ? 0 : 1;
        Product::where('id', $product->id)->update(['promo'=>$promo]);
        return redirect()->back();
    }

    public function rekomendasi(Product $product)
    {
        $rekomendasi=$product->rekomendasi==1 ? 0 : 1;
        Product::where('id', $product->id)->update(['rekomendasi'=>$rekomendasi]);
        return redirect()->back();
    }
}
