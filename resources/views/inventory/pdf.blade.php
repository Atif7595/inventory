<!DOCTYPE html>
<html>
<head>
    <title>Inventory PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .user-info {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .user-info img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .user-info h2 {
            margin: 0;
            padding: 0;
        }

        .user-info p {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="user-info">

        <div>
            <h2>{{ $user->name }}</h2>
            <p>Address: H-150 Tech Town</p>
            <p>Phone: (111)-909-9254</p>
            <p>Company: Zeptop Ltd</p>
            <p>Total Estimated Value: ${{ number_format($totalEstimatedValue, 2) }}</p>
        </div>
    </div>

    <h1>Inventory List</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Stock</th>
                <th>Date</th>
                <th>Local</th>
                <!-- Add more columns as necessary -->
            </tr>
        </thead>
        <tbody>
            @foreach ($inventoryItems as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->local }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
