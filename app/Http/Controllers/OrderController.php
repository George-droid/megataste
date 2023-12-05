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
            // 'dishes.*.selected' => 'required|exists:dishes,id',
            'dishes.*.quantity' => 'required|integer|min:1', // Validate quantity
            
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

        // Further processing/validation of dish quantities
        foreach ($dishes as $dish) {
            // Ensure the dish ID is set correctly
            if (!isset($dish['selected'])) {
                return redirect()->back()->withErrors(['dishes' => 'Please select dishes'])->withInput();
            }
            // dd($dish['selected']);

            $dishModel = Dish::find($dish['selected']);
            if (!$dishModel) {
                return redirect()->back()->withErrors(['dishes' => 'Invalid dish selected'])->withInput();
            }

            dd($dishModel);
            if ($dishModel->quantity < $dish['quantity']) {
                return redirect()->back()->withErrors(['dishes' => 'Insufficient quantity for selected dish'])->withInput();
            }
        }

        // Prepare email data
        $orderDetails = [
            'customerName' => $customerName,
            'customerEmail' => $customerEmail,
            'customerPhone' => $customerPhone,
            'customerAddress' => $customerAddress,
            'dishes' => $dishes,
        ];

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
