<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function order()
    {
        $menus = Menu::with('dishes')->get();
        return view('fe.order', compact('menus'));
    }

    public function placeOrder(Request $request)
    {
        $rules = [
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string',
            'dishes.*.quantity' => 'required|integer',
            'payment_receipt' => 'required|string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Retrieve validated data
        $customerName = $request->input('customer_name');
        $customerEmail = $request->input('customer_email');
        $customerPhone = $request->input('customer_phone');
        $customerAddress = $request->input('customer_address');
        $dishes = $request->input('dishes');
        $paymentReceipt = $request->input('payment_receipt');
        $totalAmount = $request->input('total_amount');

        // Prepare email data
        $orderDetails = [
            'customerName' => $customerName,
            'customerEmail' => $customerEmail,
            'customerPhone' => $customerPhone,
            'customerAddress' => $customerAddress,
            'dishes' => $dishes,
            'paymentReceipt' => $paymentReceipt,
            'totalAmount' => $totalAmount,
        ];
        // dd($orderDetails);

        // Send email
        Mail::to('wisgeorge.wg@gmail.com')->send(new OrderConfirmation($orderDetails));

        // Redirect back or return a response
        return redirect()->back()->with('success', 'Order placed successfully!');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
