<!DOCTYPE html>
<html>

<head>
    <title>Visit Confirmation</title>
</head>

<body>
    <h1>Visit Confirmation</h1>
    <p>Dear {{ $visitDetail->visitor_name }},</p>
    <p>Thank you for scheduling a visit with us. We are looking forward to meeting you.</p>
    <p>Your date of visit is <strong>{{ $visitDetail->visit_date }}</strong>.</p>
    <p>Property Selected: <strong>{{ $visitDetail->property_details->property_name }}</strong></p>
    <p>If you have any questions, feel free to contact us at info@example.com.</p>
    <p>Regards,<br>Villa Agency</p>
</body>

</html>
