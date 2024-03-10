<!DOCTYPE html>
<html>

<head>
    <title>New Visit Request</title>
</head>

<body>
    <h1>New Visit Request</h1>
    <p>A new visit has been scheduled:</p>
    <ul>
        <li>Name: {{ $visitDetail->visitor_name }}</li>
        <li>Email: {{ $visitDetail->visitor_email }}</li>
        <li>Contact: {{ $visitDetail->visitor_contact }}</li>
        <li>Gender: {{ $visitDetail->gender }}</li>
        <li>Date of Visit: {{ $visitDetail->visit_date }}</li>
        <li>Property: {{ $visitDetail->property_details->property_name }}</li>
        <li>Message: {{ $visitDetail->additional_message }}</li>
        <!-- Access additional_message directly from $visitDetail -->
    </ul>
    <p>Please check the admin panel for more details.</p>
    <p>Regards,<br>Villa Agency</p>
</body>

</html>
