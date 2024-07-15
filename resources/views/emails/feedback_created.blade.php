<!DOCTYPE html>
<html>
<head>
    <title>New Feedback Created</title>
</head>
<body>
    <h1>New Feedback Created</h1>
    <p>A new feedback has been created with the following details:</p>
    <p><strong>Customer Name:</strong> {{ $feedback->customer_name }}</p>
    <p><strong>Feedback Date:</strong> {{ $feedback->feedback_date }}</p>
    <p><strong>Feedback Text:</strong> {{ $feedback->feedback_text }}</p>
    <p><strong>Rating:</strong> {{ $feedback->rating }}</p>
</body>
</html>
