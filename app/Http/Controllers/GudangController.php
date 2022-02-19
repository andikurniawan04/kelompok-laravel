<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Gudang::all();
        return view("warehouses/index")->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warehouses/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required'
        ]);

        $result = Gudang::create([
            'nama_gudang' => $request->nama,
            'alamat_gudang' => $request->alamat
        ]);

        if ($result) {
            return redirect()->route('warehouse.index')->with('Berhasil', "Data berhasil ditambahkan");
        } else {
            return redirect()->route('warehouse.index')->with('Gagal', "Data gagal ditambahkan");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function show(Gudang $gudang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gudang = Gudang::findOrFail($id);
        return view('warehouses/edit', compact('gudang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required'
        ]);

        $result = Gudang::findOrFail($id)->update([
            'nama_gudang' => $request->nama,
            'alamat_gudang' => $request->alamat
        ]);

        if ($result) {
            return redirect()->route('warehouse.index')->with('Berhasil', "Data berhasil diubah");
        } else {
            return redirect()->route('warehouse.index')->with('Gagal', "Data gagal diubah");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Gudang::findOrFail($id)->delete();

        if ($result) {
            return redirect()->route('warehouse.index')->with('Berhasil', "Data berhasil dihapus");
        } else {
            return redirect()->route('warehouse.index')->with('Gagal', "Data gagal dihapus");
        }
    }
}
