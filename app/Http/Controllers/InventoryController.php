<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Inventory;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Inventory::Join('produk', 'produk.id_produk', '=', 'inventory.id_produk')
            ->Join('gudang', 'gudang.id_gudang', '=', 'inventory.id_gudang')
            ->select('id_inventory', 'nama_produk', 'nama_gudang', 'status', 'jumlah')
            ->get();

        return view("inventorys/index")->with([
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
        $produk = Product::join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori')
            ->select('id_produk', 'nama_produk', 'nama_kategori')
            ->get();

        $gudang = Gudang::all();

        return view("inventorys/create")->with([
            'produk' => $produk,
            'gudang' => $gudang
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'id_produk' => 'required',
                'id_gudang' => 'required',
                'jumlah' => 'required',
                'status' => 'required'
            ]);
            Inventory::create([
                'id_produk' => $request->id_produk,
                'id_gudang' => $request->id_gudang,
                'jumlah' => $request->jumlah,
                'status' => $request->status
            ]);
            $status = "Berhasil";
            $msg = "Data berhasil disimpan";
        } catch (Exception $e) {
            $status = "Gagal";
            $msg = "Data gagal disimpan";
        }

        return redirect()->route('inventory.index')->with($status, $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        $gudang = Inventory::Join('gudang', 'inventory.id_gudang', '!=', 'gudang.id_gudang')
            ->distinct()
            ->select('nama_gudang', 'gudang.id_gudang')
            ->get();

        $produk = Inventory::Join('produk', 'inventory.id_produk', '!=', 'produk.id_produk')
            ->distinct()
            ->select('nama_produk', 'produk.id_produk')
            ->get();

        $data = Inventory::Join('produk', 'produk.id_produk', '=', 'inventory.id_produk')
            ->Join('gudang', 'gudang.id_gudang', '=', 'inventory.id_gudang')
            ->select('nama_produk', 'nama_gudang', 'status', 'jumlah', 'produk.id_produk', 'gudang.id_gudang', 'id_inventory')
            ->get();

        return view('inventorys.edit', compact('produk', 'data', 'gudang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        try {
            $this->validate($request, [
                'id_produk' => 'required',
                'id_gudang' => 'required',
                'jumlah' => 'required',
                'status' => 'required'
            ]);

            $inventory->update([
                'id_produk' => $request->id_produk,
                'id_gudang' => $request->id_gudang,
                'jumlah' => $request->jumlah,
                'status' => $request->status
            ]);
            $status = "Berhasil";
            $msg = "Data berhasil diubah";
        } catch (Exception $e) {
            $status = "Gagal";
            $msg = "Data gagal diubah";
        }


        return redirect()->route('inventory.index')->with($status, $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        try {
            $inventory->delete();
            $status = "Berhasil";
            $msg = "Data berhasil dihapus";
        } catch (Exception $e) {
            $status = "Gagal";
            $msg = "Data gagal dihapus";
        }


        return redirect()->route('inventory.index')->with($status, $msg);
    }
}
