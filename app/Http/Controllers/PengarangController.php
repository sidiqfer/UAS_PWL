<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengarang = Pengarang::orderBy('nama', 'ASC')->get();

        return view('admin.pengarang.index', compact('pengarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengarang.create');
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
            'nama' => 'required',
            'email' => 'required|unique:pengarang,email',
            'hp' => 'required|numeric',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('foto')) {
            $imageName = time() . '.' . $image->extension();
            $destinationPath = public_path('/images/pengarang');
            $img = Image::make($image->path());
            $img->resize(180, 180, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $imageName);

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);

            (File::exists(public_path("/images/$imageName"))) ? File::delete(public_path("/images/$imageName")) : "";

            $data = $request->all();
            $data['foto'] = $imageName;
            Pengarang::create($data);
        } else {
            Pengarang::create($input);
        }

        return redirect()->route('pengarang.index')->with('success', 'Berhasil menambah data pengarang.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengarang = Pengarang::find($id);
        return view('admin.pengarang.show', compact('pengarang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengarang = Pengarang::find($id);
        return view('admin.pengarang.edit', compact('pengarang'));
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
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:pengarang,email,' . $id,
            'hp' => 'required|numeric',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pengarang = Pengarang::find($id);

        if (is_null($request->foto)) {
            $request->request->remove('foto');
            (File::exists(public_path("/images/pengarang/$pengarang->foto"))) ? File::delete(public_path("/images/pengarang/$pengarang->foto")) : "";
            $pengarang->update($request->all());
        } else {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->extension();

            $destinationPath = public_path('/images/pengarang');
            $img = Image::make($image->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $imageName);

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);

            (File::exists(public_path("/images/$imageName"))) ? File::delete(public_path("/images/$imageName")) : "";
            (File::exists(public_path("/images/pengarang/$pengarang->foto"))) ? File::delete(public_path("/images/pengarang/$pengarang->foto")) : "";

            $data = $request->all();
            $data['foto'] = $imageName;
            $pengarang->update($data);
        }
        $pengarang->save();

        return redirect()->route('pengarang.index')
            ->with('success', 'Berhasil mengedit pengarang.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengarang $pengarang)
    {
        $pengarang->delete();
        if ($pengarang->foto) {
            (File::exists(public_path("/images/pengarang/$pengarang->foto"))) ? File::delete(public_path("/images/pengarang/$pengarang->foto")) : "";
        }

        return redirect()->route('pengarang.index')
            ->with('success', 'Berhasil menghapus pengarang');
    }
}
