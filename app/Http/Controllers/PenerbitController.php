<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbit = Penerbit::orderBy('nama', 'ASC')->get();

        return view('admin.penerbit.index', compact('penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.penerbit.create');
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
            'nama' => 'required|unique:penerbit,nama',
            'alamat' => 'required',
            'email' => 'required',
            'website' => ['required', 'regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'telp' => 'required',
            'cp' => 'required'
        ]);

        Penerbit::create($request->all());

        return redirect()->route('penerbit.index')
            ->with('success', 'Berhasil menambahkan penerbit.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penerbit = Penerbit::find($id);
        return view('admin.penerbit.show', compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penerbit = Penerbit::find($id);
        return view('admin.penerbit.edit', compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penerbit $penerbit)
    {
        $request->validate([
            'nama' => 'required|unique:penerbit,nama,' . $penerbit->id,
            'alamat' => 'required',
            'email' => 'required',
            'website' => ['required', 'regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'telp' => 'required',
            'cp' => 'required'
        ]);

        $penerbit->update($request->all());

        return redirect()->route('penerbit.index')
            ->with('success', 'Berhasil mengedit penerbit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(penerbit $penerbit)
    {
        $penerbit->delete();

        return redirect()->route('penerbit.index')
            ->with('success', 'Berhasil menghapus penerbit');
    }
}
