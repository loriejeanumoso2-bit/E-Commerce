@extends('admin.maindesign')

@section('view_category')

@if(session('deletecategory_message'))
<div style="margin-bottom: 10px; color: black; background-color: orangered;">
    {{ session('deletecategory_message') }}
</div>
@endif

@if(session('deleteproduct_message'))
<div style="margin-bottom: 10px; color: black; background-color: orangered;">
    {{ session('deleteproduct_message') }}
</div>
@endif

<div class="list-inline-item">
    <form action="{{ route('admin.searchproduct') }}" method="GET">
        <div class="form-group">
            <input type="search" name="search" placeholder="What are you searching for...">
            <button type="submit" class="submit">Search</button>
        </div>
    </form>
</div>

<style>
table {
    width: 60%;
    border-collapse: collapse;
    margin: 20px auto;
    font-family: Arial, sans-serif;
}
th {
    border: 1px solid black;
    padding: 10px;
    text-align: center;
}
td {
    border: 1px solid black;
    padding: 10px;
    text-align: center;
    background-color: #e9f7fa;
}
th {
    background-color: #f2f2f2;
}
</style>

<table>
    <thead>
        <tr>
            <th>Product Title</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Image</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
        <tr>
            <td style="padding:12px;">{{ $product->product_title }}</td>
            <td style="padding:12px;">{{ Str::limit($product->product_description, 50, "...") }}</td>
            <td style="padding:12px;">{{ $product->product_quantity }}</td>
            <td style="padding:12px;">{{ $product->product_prices }}</td>
            <td>
                <img src="{{ asset('product/'.$product->product_image) }}" width="80">
            </td>
            <td style="padding:12px;">{{ $product->product_category }}</td>
            <td style="padding:12px;">
                <a href="{{ route('admin.deleteproduct',$product->id) }}" onclick= "return confirm ('Are you  sure?')">Delete</a>
                <a href="{{ route('admin.updateproduct',$product->id) }}" style="color:green">Update</a>
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>

@endsection