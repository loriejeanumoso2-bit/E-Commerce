@extends('admin.maindesign')

@section('view_category')

@if(session('deletecategory_message'))
<div style="margin-bottom: 10px; color: black;  background-color: orangered;">
    {{session('deletecategory_message')}}
</div>
@endif

<html>
<head>
    <title>view product</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<table border="1" cellpadding="12" cellspacing="0">
    <tr>
        <th>Product Title</th>
        <th>Product Description</th>
        <th>Product Quantity</th>
        <th>Product Prices</th>
        <th>Product Image</th>
        <th>Product Category</th>
        <th>Action</th>
        
    </tr>

    @foreach ($product as $item)
        <tr>
            <td style="padding:12px;">{{ $item->product_title }}</td>
            <td style="padding:12px;">{{Str::limit($item->product_description,50,"..." ) }}</td>
            <td style="padding:12px;">{{ $item->product_quantity }}</td>
            <td style="padding:12px;">{{ $item->product_prices}}</td>
            <td style="padding:12px;">{{ $item->product_image}}</td>
            <td style="padding:12px;">{{ $item->product_category }}</td>
            <td style="padding:12px;">
            <a href="{{ url('delete_product/'.$item->id) }}" onclick="return confirm('Are you sure?')">
                 Delete</a>

            <a href="{{ url('edit_product/'.$item->id) }}" style="color:green">
             Update</a>
            </td>
        </tr>
    @endforeach
    
</table>
    <div style="text-align:center; margin-top: 20px;">
    {{ $product->links() }}
</div>

</body>
</html>

@endsection