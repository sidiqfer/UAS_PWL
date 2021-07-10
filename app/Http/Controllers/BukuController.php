<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Pengarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::select('buku.*', 'kategori.nama')->join('kategori', 'kategori.id', '=', 'buku.kategori_id')->orderBy('judul', 'ASC')->get();

        return view('admin.buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::pluck('nama', 'id');
        $pengarang = Pengarang::pluck('nama', 'id');
        $penerbit = Penerbit::pluck('nama', 'id');
        return view('admin.buku.create', compact('kategori', 'pengarang', 'penerbit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required|numeric|unique:buku,isbn',
            'judul' => 'required',
            'tahun_cetak' => 'required|numeric',
            'stok' => 'required|numeric',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori_id' => 'required',
            'pengarang_id' => 'required',
            'penerbit_id' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('cover')) {
            $imageName = time() . '.' . $image->extension();
            $destinationPath = public_path('/images/cover');
            $img = Image::make($image->path());
            $img->resize(180, 180, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $imageName);

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);

            (File::exists(public_path("/images/$imageName"))) ? File::delete(public_path("/images/$imageName")) : "";

            $data = $request->all();
            $data['cover'] = $imageName;
            Buku::create($data);
        } else {
            Buku::create($input);
        }

        return redirect()->route('buku.index')->with('success', 'Berhasil menambah data buku.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        $buku = Buku::select('buku.*', 'kategori.nama as kategori', 'penerbit.nama as penerbit', 'pengarang.nama as pengarang')
            ->join('kategori', 'kategori.id', '=', 'buku.kategori_id')
            ->join('pengarang', 'pengarang.id', '=', 'buku.pengarang_id')
            ->join('penerbit', 'penerbit.id', '=', 'buku.penerbit_id')
            ->find($buku->id);
        return view('admin.buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        $kategori = Kategori::pluck('nama', 'id');
        $pengarang = Pengarang::pluck('nama', 'id');
        $penerbit = Penerbit::pluck('nama', 'id');
        $buku = Buku::find($buku->id);
        return view('admin.buku.edit', compact('buku', 'kategori', 'pengarang', 'penerbit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'isbn' => 'required|numeric|unique:buku,isbn,' . $buku->id,
            'judul' => 'required',
            'tahun_cetak' => 'required|numeric',
            'stok' => 'required|numeric',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori_id' => 'required',
            'pengarang_id' => 'required',
            'penerbit_id' => 'required',
        ]);

        if ($request->cover) {
            $image = $request->file('cover');
            $imageName = time() . '.' . $image->extension();

            $destinationPath = public_path('/images/cover');
            $img = Image::make($image->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $imageName);

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);

            (File::exists(public_path("/images/$imageName"))) ? File::delete(public_path("/images/$imageName")) : "";
            (File::exists(public_path("/images/cover/$buku->cover"))) ? File::delete(public_path("/images/cover/$buku->cover")) : "";

            $data = $request->all();
            $data['cover'] = $imageName;
            $buku->update($data);
        }
        $buku->save();

        return redirect()->route('buku.index')
            ->with('success', 'Berhasil mengedit buku.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        if ($buku->cover) {
            (File::exists(public_path("/images/cover/$buku->cover"))) ? File::delete(public_path("/images/cover/$buku->cover")) : "";
        }

        return redirect()->route('buku.index')
            ->with('success', 'Berhasil menghapus buku');
    }
}
