<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $datas = Customers::all();
        $datas = Customers::orderBy('id', 'desc')->get();
        $title = "Data Pelanggan";
        return view('customer.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Pelanggan";
        return view('customer.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataValidated = $request->validate([
            'name' => 'required',
            'phone' => 'nullable|string',
            'address' => 'nullable|string'
        ]);

        Customers::create($dataValidated);
        Alert::success('Mantap!', 'Data berhasil ditambah');
        return redirect()->to('customer')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Ubah Pelanggan";
        $customer = Customers::find($id);
        // untuk blank^
        return view('customer.edit', compact('edit', 'title'));
        // $customer = Customers::findOrFail($id);
        // // akan keluar 404^
        // $customer = Customers::where('id', $id)->first();
        // // sesuai parameter^
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataValidated = $request->validate([
            'name' => 'required|string',
            'phone' => 'nullable|string',
            'address' => 'nullable|string'
        ]);

        $customer = Customers::findOrfail($id);
        $customer->update($dataValidated);
        Alert::success('Sukses!', 'Data berhasil diubah');
        return redirect()->to('customer')->with('Sukses!', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customers::findOrFail($id);
        $customer->delete();
        toast('Data berhasil dihapus', 'Sukses!');
        return redirect()->to('customer')->with('Sukses!', 'Data berhasil dihapus');
    }
}
