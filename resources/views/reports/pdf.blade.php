<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <style>

        body{

            font-family: DejaVu Sans;

            font-size:13px;

        }

        table{

            width:100%;

            border-collapse:collapse;

        }

        table,th,td{

            border:1px solid #000;

        }

        th,td{

            padding:8px;

            text-align:center;

        }

        h2{

            text-align:center;

        }

    </style>

</head>

<body>

<h2>Inventory Report</h2>

<table>

    <thead>

    <tr>

        <th>#</th>

        <th>Product</th>

        <th>User</th>

        <th>Type</th>

        <th>Quantity</th>

        <th>Date</th>

    </tr>

    </thead>

    <tbody>

    @foreach($movements as $movement)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $movement->product->name }}</td>

            <td>{{ $movement->user->name }}</td>

            <td>{{ strtoupper($movement->type) }}</td>

            <td>{{ $movement->quantity }}</td>

            <td>{{ $movement->created_at->format('d/m/Y H:i') }}</td>

        </tr>

    @endforeach

    </tbody>

</table>

</body>

</html>
