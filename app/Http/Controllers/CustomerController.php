<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;


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
        Customers::create($request->all());
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
        $customer = Customers::find($id);
        $customer->customer_name = $request->customer_name;
        $customer->price = $request->price;
        $customer->description = $request->description;
        $customer->save();
        return redirect()->to('customer')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customers::find($id);
        $customer->delete();
        return redirect()->to('customer')->with('success', 'Data berhasil dihapus');
    }
}
