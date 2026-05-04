@extends('maindesign')

@section('viewcart_products')
<a href="{{ route('index') }}" class="back-link">
        ← Back to Products
    </a>

<div style="max-width: 1000px; margin: 0 auto; padding: 20px;">

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

<table border="1" cellpadding="12" cellspacing="0">
    <tr>
        <th>Product Title</th>
        <th>Product Prices</th>
        <th>Product Image</th>
        <th>Action</th>
        
    </tr>
    @php
        $price = 0;
    @endphp

    @foreach ($cart as $cart_product)
        <tr>
            <td style="padding:12px;">{{ $cart_product->product->product_title}}</td>
            <td style="padding:12px;">{{$cart_product->product->product_prices}}</td>
            <td style="padding:12px;"><img style="width: 150px;" src="{{asset('product/'.$cart_product->product->product_image)}}"></td>
            <td style="padding:12px;">
            <a  style="padding:10px; background-color: red; color: white;" href="{{route('removecartproducts',$cart_product->id) }}" onclick="return confirm('Are you sure?')">
                 Remove</a>
            </td>
        </tr>
        @php
            $price=$price+$cart_product->product->product_prices;
        @endphp
    @endforeach
    
    <tr style="border-bottom: 1px solid #ddd; background-color: gray;">
         <td style="padding:12px;">Total Price</td>
            <td style="padding:12px;">₱{{$price}}</td>
            
    </tr>
</table>
@if(session('confirm_order'))
<div style="border:1px solid blue; color:white; border-radius:4px; padding: 10px;
    background-color:blue; margin-bottom:10px;">
    {{session('confirm_order')}}
</div>
@endif
<form action="{{ route('confirm_order') }}" method="post" style="margin-top: 50px;">
    @csrf

    <h4>Contact Info</h4>

    <textarea name="Receiver_address"
        placeholder="Enter your address (Province, City, Barangay, Zone)"
        style="width: 400px; height: 80px; padding:10px;" required></textarea>

    <br><br>

    <input type="text" name="Receiver_phone"
        placeholder="Enter your phone number"
        style="width: 400px; height: 40px; padding:10px;" required>

    <br><br>

    <input class="btn-primary" type="submit" value="Confirm Order">
</form>
</div>
@endsection