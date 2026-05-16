<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="{{asset('admin/css/allproducts.css')}}"
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="topbar">
        Cea is Boutique
    </div>

  <nav class="navbar">
    <a href="{{ route('index') }}">HOME</a>
    <a href="{{ route('viewallproducts') }}" class="active">SHOP</a>
    <a href="{{ route('why_us') }}">WHY US</a>
    <a href="{{route('contact_us')}}">CONTACT US</a>

    <div class="icons">
      <a href="{{route('login')}}"><i class="fa-solid fa-user"></i> Login</a>
      <a href="{{route('cartproducts')}}"><i class="fa-solid fa-bag-shopping"></i></a>
      <a href="{{ route('search')}}"><i class="fa-solid fa-magnifying-glass"></i></a>
    </div>
  </nav>
   

    <div class="container mt-4">

        <div class="row">

            @foreach($products as $product)

            <div class="col-6 col-md-4 col-lg-3">

                <a href="{{ route('product_details',$product->id) }}">

                    <div class="product-card">

                        <div class="badge-new">
                            NEW
                        </div>

                        <img class="product-image"
                        src="{{ asset('product/'.$product->product_image) }}"
                        alt="">

                        <div class="product-info">

                            <div class="product-title">
                                {{ $product->product_title }}
                            </div>

                            <div class="product-price">
                                ₱{{ $product->product_prices }}
                            </div>

                        </div>

                    </div>

                </a>

            </div>

            @endforeach

        </div>

        <div class="text-center">
            <a class="view-btn" href="{{ route('index') }}">
                View Latest Products
            </a>
        </div>

    </div>

</body>
</html>