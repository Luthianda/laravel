<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Customers;
use App\Models\TransOrders;
use App\Models\TransDetails;
use App\Models\TransPickups;
use Illuminate\Http\Request;
use App\Models\TypeOfServices;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class TransOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function __construct()
    // {
    //     Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    //     Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
    //     Config::$isSanitized = true;
    //     Config::$is3ds = true;
    // }

    public function index()
    {
        $title = "Transaksi Order";
        $datas = TransOrders::with('customer')->orderBy('id', 'desc')->get();
        confirmDelete('title', 'text');
        return view('trans.transaksi2', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //TR-01072025-001 format kode
        // $today = date('dmY')
        $today = Carbon::now()->format('dmY');
        $countDay = TransOrders::whereDate('created_at', now()->toDateString())->count() + 1;
        $runningNumber = str_pad($countDay, 3, '0', STR_PAD_LEFT);
        $title = "Tambah Transaksi";
        $orderCode = "TR-" . $today . "-" . $runningNumber;

        $customers = Customers::orderBy('id', 'desc')->get();
        $services = TypeOfServices::orderBy('id', 'desc')->get();
        $orders = TransOrders::with(['customer', 'details.service'])->orderBy('id', 'desc')->get();
        return view('trans.create', compact('title', 'orderCode', 'customers', 'services', 'orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $dataValidated = $request->validate([
        //     'id_customer' => 'required|numeric|exists:customers,id',
        //     'order_code' => 'required|string|unique:trans_orders,order_code',
        //     'order_end_date' => 'required|date',
        //     'order_note' => 'nullable|string',
        //     'order_pay' => 'nullable|numeric',
        //     'order_change' => 'nullable|numeric',
        //     'total' => 'required|numeric'
        // ]);

        // $order = TransOrders::create($dataValidated);
        // $id_order = $order->id;
        // foreach ($request->id_service as $key => $idService) {
        //     $dataValidated2 = $request->validate([
        //         'id_service' => 'required|numeric|exists:services,id',
        //         '' => 'nullable|numeric',
        //         'total' => 'required|numeric'
        //     ]);
        // }

        if (empty($request->total)) {
            Alert::error('Oops...', 'Please Add Service Packet');
            return back();
        }

        $order = TransOrders::create([
            'id_customer' => $request->id_customer,
            'order_code' => $request->order_code,
            'order_date' => Carbon::now(),
            'order_end_date' => Carbon::now()->addDays(2),
            'order_note' => $request->order_note,
            'total' => $request->total
        ]);

        $id_order = $order->id;
        foreach ($request->id_service as $index => $idService) {
            TransDetails::create([
                'id_order' => $id_order,
                'id_service' => $idService,
                'qty' => $request->qty[$index],
                'subtotal' => $request->subtotal[$index]
            ]);
        }

        Alert::success('Sukses!', 'Data berhasil ditambah');
        return redirect()->route('order.index')->with('Sukses!', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Transaction Order";
        $order = TransOrders::with(['customer', 'details.service'])->findOrFail($id);
        // dd($order->details);
        return view('order.show', compact('title', 'order'));
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $title = "Detail Transaksi";
    //     $details = TransOrders::with(['customer', 'details.service'])->where('id', $id)->first();
    //     $params = [
    //         'transaction_details' => [
    //             'order_id' => rand(),
    //             'gross_amount' => 10000,
    //         ],
    //         'customer_details' => [
    //             'first_name' => "Nanda",
    //             'last_name' => "Luthfi",
    //             'email' => "nanda@gmail.com",
    //             'phone' => "084545314654",
    //         ],
    //         'enable_payment' => [
    //             'qris'
    //         ],

    //     ];


    //     // $snapToken = Snap::getSnapToken($params);
    //     $snapToken = Snap::createTransaction($params);
    //     return view('trans.show', compact('title', 'details', 'snapToken'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Transaction Order";
        $order = TransOrders::findOrFail($id);
        return view('trans.edit', compact('title', 'order'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataValidated = $request->validate([
            'order_pay' => 'required|numeric',
            'order_change' => 'required|numeric'
        ]);

        $order = Transorders::findOrFail($id);
        $order->update($dataValidated);
        $order->order_status = 1;
        $order->save();

        // $order = Transorders::findOrFail($id);
        TransPickups::create([
            'id_order' => $order->id,
            'id_customer' => $order->customer->id
        ]);
        Alert::success('Excellent', 'Update data order successfully');
        return redirect()->route('order.index')->with('success', 'Update data order successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = TransOrders::findOrFail($id);
        $order->delete();
        toast('Data berhasil dihapus', 'Sukses!');
        return redirect()->route('trans.index')->with('Sukses!', 'Data berhasil dihapus');
    }

    public function printStruk(string $id)
    {
        $details = TransOrders::with(['customer', 'details.service'])->where('id', $id)->first();
        // return $details;
        // dd($details);
        return view('trans.print', compact('details'));
    }

    public function snap(Request $request, $id)
    {
        $order = TransOrders::with(['details', 'customer'])->findOrFail($id);

        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => $order->total,
            ],
            'customer_details' => [
                'first_name' => $order->customer->name ?? "Umum",
                'email' => $order->customer->email ?? "dummy@email.com",
            ],
            // 'enabled_payments' => ['qris'],
        ];


        // $snapToken = Snap::getSnapToken($params);
        $snap = Snap::createTransaction($params);
        return response()->json(['token' => $snap->token]);
    }
}
