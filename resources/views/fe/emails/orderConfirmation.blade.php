<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
</head>
<body>
    <h2>Order Confirmation</h2>
    <p>Dear {{ $orderDetails['customerName'] }},</p>
    
    <p>Your order details:</p>
    
    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Dish</th>
                <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Quantity</th>
                <!-- Add more table headers if needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($orderDetails['dishes'] as $dish)
            @if (isset($dish['selected']) && $dish['quantity'] > 0)
                @php
                    $dishModel = \App\Models\Dish::find($dish['selected']);
                    $dishName = $dishModel ? $dishModel->name : 'Unknown Dish';
                @endphp
                <tr>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $dishName }}</td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $dish['quantity'] }}</td>
                    <!-- Add more table cells if needed -->
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>

    <!-- Add other order details below if needed -->
    <p>Total Amount: {{ $orderDetails['totalAmount'] }}</p>
    <p>Customer Email: {{ $orderDetails['customerEmail'] }}</p>
    <p>Customer Phone: {{ $orderDetails['customerPhone'] }}</p>
    <p>Customer Address: {{ $orderDetails['customerAddress'] }}</p>
    <p>Payment Receipt: {{ $orderDetails['paymentReceipt'] }}</p>
    <p>Thank you for your order!</p>
</body>
</html>
