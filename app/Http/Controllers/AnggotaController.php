<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

use const PHPSTORM_META\ANY_ARGUMENT;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::orderBy('no_anggota', 'ASC')->get();

        return view('admin.anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggota = Anggota::orderBy('id', 'DESC')->first();
        $no_urut = $anggota->no_anggota ? 'AGT' . (substr($anggota->no_anggota, 3) + 1) : 'AGT1';
        return view('admin.anggota.create', compact('no_urut'));
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
            'no_anggota' => 'required|unique:anggota,no_anggota',
            'nama' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:anggota,email',
            'hp' => 'required|numeric|unique:anggota,hp',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('foto')) {
            $imageName = time() . '.' . $image->extension();
            $destinationPath = public_path('/images/anggota');
            $img = Image::make($image->path());
            $img->resize(180, 180, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $imageName);

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);

            (File::exists(public_path("/images/$imageName"))) ? File::delete(public_path("/images/$imageName")) : "";

            $data = $request->all();
            $data['foto'] = $imageName;
            Anggota::create($data);
        } else {
            Anggota::create($input);
        }

        return redirect()->route('anggota.index')->with('success', 'Berhasil menambah data anggota.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = Anggota::find($id);
        return view('admin.anggota.show', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::find($id);
        return view('admin.anggota.edit', compact('anggota'));
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
            'no_anggota' => 'required|unique:anggota,no_anggota,' . $id,
            'nama' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:anggota,email,' . $id,
            'hp' => 'required|numeric|unique:anggota,hp,' . $id,
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $anggota = Anggota::find($id);

        if (is_null($request->foto)) {
            $request->request->remove('foto');
            (File::exists(public_path("/images/anggota/$anggota->foto"))) ? File::delete(public_path("/images/anggota/$anggota->foto")) : "";
            $anggota->update($request->all());
        } else {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->extension();

            $destinationPath = public_path('/images/anggota');
            $img = Image::make($image->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $imageName);

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);

            (File::exists(public_path("/images/$imageName"))) ? File::delete(public_path("/images/$imageName")) : "";
            (File::exists(public_path("/images/anggota/$anggota->foto"))) ? File::delete(public_path("/images/anggota/$anggota->foto")) : "";

            $data = $request->all();
            $data['foto'] = $imageName;
            $anggota->update($data);
        }
        $anggota->save();

        return redirect()->route('anggota.index')
            ->with('success', 'Berhasil mengedit anggota.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();
        if ($anggota->foto) {
            (File::exists(public_path("/images/anggota/$anggota->foto"))) ? File::delete(public_path("/images/anggota/$anggota->foto")) : "";
        }
        return redirect()->route('anggota.index')
            ->with('success', 'Berhasil menghapus anggota');
    }
}
