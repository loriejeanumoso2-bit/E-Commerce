@extends('admin.maindesign')

@section('view_orders')
<div class="container" style="margin-top:30px;">
    <h2 style="color:white; margin-bottom:20px;">Orders List</h2>

    <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse: collapse; background:#1f2733; color:white; border-radius:10px; overflow:hidden;">

    
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
            background-color: #eee7e7;
        }
    </style>
</head>
<body>

<table-border="1" cellpadding="12" cellspacing="0">
    <tr>
        <th>Customer Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Product</th>
        <th>Price</th>
        <th>Product Image</th>
        <th>Status</th>
        <th>Invoice</th>
    </tr>

    @foreach ($orders as $order)
         <tr style="text-align:center; border-bottom:1px solid #444;">
            <td style="padding:12px;">{{ $order->user->name}}</td>
            <td style="padding:12px;">{{ $order->Receiver_address}}</td>
            <td style="padding:12px;">{{ $order->Receiver_phone}}</td>
            <td style="padding:12px;">{{ $order->product->product_title}}</td>
            <td style="padding:12px;">{{ $order->product->product_prices}}</td>
            <td style="padding:12px;"> <img style="width: 150px;" src="{{asset('product/'.$order->product->product_image)}}"></td>
            <td style="padding:12px;">

            <form action="{{route('admin.change_status',$order->id)}}" method="post">
                @csrf
              <select name="status" id="">
                <option value="{{ $order->status}}">{{ $order->status}}</option>
                <option value="Delivered">Delivered</option>
                <option value="Pending">Pending</option>
    
              </select>
              <input type="submit" name="submit" value="submit" onclick= "return confirm ('Are you  sure?')">
            </form>
            </td>
            <td style=" padding: 15px;">
            <a href="{{route('admin.downloadinvoice',$order->id)}}" class="btn btn-primary"->Download Invoice</a>

            </td>
        </tr
    @endforeach
    


@endsection