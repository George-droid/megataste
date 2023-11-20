<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <p>Hello admin, a customer, {{ $data['name'] }} with the</p>
    <p>Email: {{ $data['email'] }}, and</p>
    <p>Phone number: {{ $data['phone'] }} with a concern of;</p>
    <p>Subject: {{ $data['subject'] }}</p>
    <p>Message: {{ $data['message'] }}</p>
</body>
</html>