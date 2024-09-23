<!DOCTYPE html>
<html>

<head>
    <title>New Appointment Scheduled</title>
</head>

<body>
    <h1>New Appointment Details</h1>
    <p><strong>Name:</strong> {{ $appointment['name'] }}</p>
    <p><strong>Email:</strong> {{ $appointment['email'] }}</p>
    <p><strong>Phone:</strong> {{ $appointment['phone'] }}</p>
    <p><strong>Preferred Date:</strong> {{ $appointment['date'] }}</p>
</body>

</html>