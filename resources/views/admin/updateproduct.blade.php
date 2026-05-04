@extends('admin.maindesign')

@section('update_product')

@if(session('product_message'))
<div style="border:1px solid blue; color:white; border-radius:4px; padding: 10px;
    background-color:blue; margin-bottom:10px;">
    {{session('product_message')}}
</div>
@endif

<div class="container-fluid" style="margin-left: 400px;">
    <form action="{{route('admin.postupdateproduct',$product->id)}}" method="POST"
        enctype="multipart/form-data">
        @csrf

        <input type="text" name="product_title" value="{{$product->product_title}}" placeholder="Enter Product Name"><br><br>

        <textarea name="product_description" style="width:300px; height:200px;">{{$product->product_description}}</textarea><br><br>

        <input type="number" name="product_quantity" value="{{$product->product_quantity}}" placeholder="Enter Product Quantity"><br><br>

        <input type="number" name="product_price" value="{{$product->product_price}}" placeholder="Enter Product Price"><br><br>

        <img style="width:100px;" src="{{ asset('products/'.$product->product_image) }}">
        <label>Old Image</label><br>
        <input type="file" name="product_image"><br><br>

        <select name="product_category">
            <option value="{{$product->product_category}}">
                {{$product->product_category}}
            </option>

            @foreach($category as $cat)
                <option value="{{$cat->category}}">{{$cat->category}}</option>
            @endforeach
        </select><br><br>

        <input type="submit" value="Update Product">
    </form>
</div>

@endsection