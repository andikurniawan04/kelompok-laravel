<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        return view("categorys/index")->with([
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
        return view("categorys/create");
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
            'nama' => 'required'
        ]);

        $result = Category::create([
            'nama_kategori' => $request->nama
        ]);

        if ($result) {
            return redirect()->route('category.index')->with('Berhasil', "Data berhasil ditambahkan");
        } else {
            return redirect()->route('category.index')->with('Gagal', "Data gagal ditambahkan");
        }
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
        $data = Category::findOrFail($id);
        return view('categorys.edit', compact('data'));
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
            'nama' => 'required'
        ]);

        $result = Category::findOrFail($id)->update([
            'nama_kategori' => $request->nama
        ]);

        if ($result) {
            return redirect()->route('category.index')->with('Berhasil', "Data berhasil diubah");
        } else {
            return redirect()->route('category.index')->with('Gagal', "Data gagal diubah");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Category::findOrFail($id)->delete();

        if ($result) {
            return redirect()->route('category.index')->with('Berhasil', "Data berhasil dihapus");
        } else {
            return redirect()->route('category.index')->with('Gagal', "Data berhasil dihapus");
        }
    }
}
