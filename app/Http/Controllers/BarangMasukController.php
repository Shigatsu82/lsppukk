<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rsetBarangMasuk = BarangMasuk::with('barang')->latest()->paginate(10);

        return view('barangmasuk.index', compact('rsetBarangMasuk'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Barang = Barang::all();
        $Masuk = BarangMasuk::all();
        return view('barangmasuk.create',compact('Masuk', 'Barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request;
        //validate form
        $this->validate($request, [
            'date'          => 'required',
            'qty'          => 'required',
            'barang_id'   => 'required',
        ]);

        //create post
        BarangMasuk::create([
            'tgl_masuk'             => $request->date,
            'qty_masuk'             => $request->qty,
            'barang_id'      => $request->barang_id,
        ]);

        //redirect to index
        return redirect()->route('barangmasuk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rsetBarangMas = BarangMasuk::find($id);

        //return $rsetBarang;

        //return view
        return view('barangmasuk.show', compact('rsetBarangMas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barangall = Barang::all();
        $rsetBarangMas = BarangMasuk::find($id);
        $selectedBarang = Barang::find($rsetBarangMas->barang_id);
        return view('barangmasuk.edit', compact('rsetBarangMas', 'barangall', 'selectedBarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'date'        => 'required',
            'qty_masuk' => 'required',
            'barang_id'        => 'required',
        ]);

        $rsetBarangMas = BarangMasuk::find($id);

            //update post without image
            $rsetBarangMas->update([
                'tgl_masuk'          => $request->date,
                'qty_masuk'           => $request->qty_masuk,
                'barang_id'          => $request->barang_id,
            ]);

        // Redirect to the index page with a success message
        return redirect()->route('barangmasuk.index')->with(['success' => 'Data Berhasil Diubah!']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rsetBarangMas = BarangMasuk::find($id);

        //delete post
        $rsetBarangMas->delete();

        //redirect to index
        return redirect()->route('barangmasuk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
