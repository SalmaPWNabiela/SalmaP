<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelPenjualan;
use App\ModelBarang;
use Validator;

class penjualan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = ModelPenjualan::all();
        //return view('penjualan', compact('data'));
        return view('penjualan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = ModelBarang::all();
        return view ('penjualan_create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'kode_barang' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
        ]);

        $data = new ModelPenjualan();
        $data->kode_barang = $request->kode_barang;
        $data->jumlah = $request->jumlah;
        $data->total_harga = $request->total_harga;
        $data->save();

        //merubah data dari controller barang.php
        $dataBeli = ModelBarang::where('kode_barang', $request->kode_barang)->first();
        $dataBeli->stok = $dataBeli->stok - $request->jumlah;
        $dataBeli->save();

        return redirect()->route('penjualan.index')->with('alert_massage', 'Berhasil menambah data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = ModelPenjualan::where('id', $id)->get();
        return view('penjualan_edit', compact('data'));
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
        //
        $this->validate($request, [
            'kode_barang' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
        ]);

        $data = ModelPenjualan::where('id', $id)->first();
        $data->kode_barang = $request->kode_barang;
        $data->jumlah = $request->jumlah;
        $data->total_harga = $request->total_harga;
        $data->save();

        return redirect()->route('penjualan.index')->with('alert_massage', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = ModelPenjualan::where('id', $id)->first();
        $data->delete();

        return redirect()->route('penjualan.index')->with('alert_massage', 'Berhasil menghapus data!');
    }
}
