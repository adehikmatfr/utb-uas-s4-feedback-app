<!DOCTYPE html>
<html>
<head>
    <title>Feedback List PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Feedback List</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Customer Name</th>
            <th>Feedback Date</th>
            <th>Feedback Text</th>
            <th>Rating</th>
        </tr>
        @php $i = 0; @endphp
        @foreach ($feedbacks as $feedback)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $feedback->customer_name }}</td>
            <td>{{ $feedback->feedback_date }}</td>
            <td>{{ $feedback->feedback_text }}</td>
            <td>{{ $feedback->rating }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
