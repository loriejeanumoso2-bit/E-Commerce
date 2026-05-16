<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 40px;
        }

        .invoice-container{
            width: 80%;
            margin: 50 auto;
            background: white;
            padding: 40px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .invoice-header{
            text-align: center;
            margin-bottom: 40px;
        }

        .invoice-header h1{
            margin: 0;
            color: #333;
        }

        .invoice-header p{
            color: #777;
        }

        .invoice-details{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .invoice-details td{
            padding: 15px;
            border: 1px solid #ddd;
        }

        .label{
            font-weight: bold;
            width: 220px;
            background: #f8f8f8;
        }

        .total{
            text-align: center;
            margin-top: 30px;
            font-size: 22px;
            font-weight: bold;
            color: #222;
        }

    </style>

</head>

<body>

    <div class="invoice-container">

        <div class="invoice-header">

            <h1>INVOICE</h1>

            <p>Thank you for your purchase!</p>

        </div>

        <table class="invoice-details">

            <tr>
                <td class="label">Customer Name</td>
                <td>{{ $data->user->name }}</td>
            </tr>

            <tr>
                <td class="label">Customer Address</td>
                <td>{{ $data->Receiver_address }}</td>
            </tr>

            <tr>
                <td class="label">Customer Phone</td>
                <td>{{ $data->Receiver_phone }}</td>
            </tr>

            <tr>
                <td class="label">Product Name</td>
                <td>{{ $data->product->product_title }}</td>
            </tr>

            <tr>
                <td class="label">Product Price</td>
                <td>PHP{{ number_format($data->product->product_prices, 2) }}</td>
            </tr>

        </table>

        <div class="total">
            Total: PHP{{ number_format($data->product->product_prices, 2) }}
        </div>

    </div>

</body>

</html>