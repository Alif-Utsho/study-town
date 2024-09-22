<!DOCTYPE html>
<html>

<head>
    <title>New Application Submitted</title>
</head>

<body>
    <h1>New Application Details</h1>
    <p><strong>Name:</strong> {{ $application['name'] }}</p>
    <p><strong>Email:</strong> {{ $application['email'] }}</p>
    <p><strong>Phone:</strong> {{ $application['phone'] }}</p>
    <p><strong>City:</strong> {{ $application['city'] }}</p>
    <p><strong>Resident Status:</strong> {{ $application['resident'] }}</p>
    <p><strong>Course:</strong> {{ $application['course'] }}</p>
    <p><strong>Message:</strong> {{ $application['message'] }}</p>
</body>

</html>