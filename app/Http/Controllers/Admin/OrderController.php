<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sale;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('customer')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req) {
        $validated = $req->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'items'=>'required|array'
        ]);

        $customer = Customer::firstOrCreate([
            'phone' => $validated['phone']
        ], [
            'name' => $validated['name'],
            'address' => $validated['address']
        ]);

        $order = Order::create([
            'customer_id' => $customer->id,
            'order_date' => now(),
            'status' => 'Belum Bayar',
            'total' => 0
        ]);

        $total = 0;
        foreach($validated['items'] as $it) {
            $product = Product::findOrFail($it['product_id']);
            $subtotal = $product->price * $it['qty'];
            $order->details()->create([
                'product_id' => $product->id,
                'qty' => $it['qty'],
                'subtotal' => $subtotal
            ]);
            $total += $subtotal;
        }

        $order->update(['total'=>$total]);

        // notif ke admin (opsional)
        return response()->json(['message'=>'Order diterima','order_id'=>$order->id],201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);
        return redirect()->route('admin.orders.index')->with('success', 'Status pesanan diperbarui');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Pesanan dihapus');
    }

    public function confirmPayment(Order $order) {
        if ($order->status === 'Sudah Bayar') {
            return back()->with('info', 'Sudah terkonfirmasi');
        }
        $order->update(['status' => 'Sudah Bayar']);

        // Buat record sales
        Sale::create([
        'order_id' => $order->id,
        'sale_date' => now(),
        'total' => $order->total,
        ]);

        // kurangi stok produk (opsional: Manager Logistik juga bisa lakukan)
        foreach($order->details as $d) {
            $p = $d->product;
            $p->decrement('stock', $d->qty);
        }

        return back()->with('success','Pembayaran dikonfirmasi dan sales tercatat.');
    }

}
