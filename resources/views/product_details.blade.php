<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Details</title>
    <link rel="stylesheet" href="{{ asset('admin/css/style.proddetails.css') }}">
   
</head>
<body>

<div class="container">

    @if(session('cart_message'))
        <div class="alert">
            {{ session('cart_message') }}
        </div>
    @endif

    <a href="{{ route('index') }}" class="back-link">
        ← Back to Products
    </a>

    <div class="product-card">
        <div class="product-flex">

            <div class="product-image">
                <img src="{{ asset('product/'.$product->product_image) }}">
            </div>

            <div class="product-info">
                <h2>{{ $product->product_title }}</h2>

                <p class="description">
                    {{ $product->product_description }}
                </p>

                <div class="price">
                    ₱{{ $product->product_prices }}
                </div>

                <p>
                    <strong>Category:</strong> {{ $product->product_category }}
                </p>

                <a href="{{ route('add_to_cart', $product->id) }}" class="btn">
                    Add to Cart
                </a>
            </div>

        </div>
    </div>

    <div class="review-section">
        <h2>Customer Reviews</h2>

        <form action="#" method="POST">
            @csrf

            <div class="input-group">
                <input type="text" placeholder="Your Name">
            </div>

            <div class="input-group">
                <input type="text" placeholder="Your Review">
            </div>

            <button type="submit" class="btn-submit">
                SEND
            </button>
        </form>
    </div>

</div>

</body>
</html>