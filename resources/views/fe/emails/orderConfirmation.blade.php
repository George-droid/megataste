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
            @foreach ($orderDetails['selectedDishes'] as $index => $dish)
                <tr>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $dish['name'] }}</td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $dish['quantity'] }}</td>
                    <!-- Add more table cells if needed -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add other order details below if needed -->

    <p>Thank you for your order!</p>
</body>
</html>
