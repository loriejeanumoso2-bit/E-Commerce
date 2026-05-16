<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" href="{{asset('admin/css/search_result.css')}}">
    
</head>

<body>

<div class="container">

    <h2>Search Results for "{{ $query }}"</h2>

    @if($products->count() > 0)

        <div class="grid">

            @foreach($products as $product)

                <div class="card">
                    <center>

                    <img src="{{ asset('product/'.$product->product_image) }}"
                         onerror="this.src='{{ asset('images/no-image.png') }}'">

                    <div class="title">
                        {{ $product->product_title }}
                    </div><br><br>

                    <div class="price">
                        ₱{{ $product->product_prices ?? 0 }}
                    </div><br><br>

                    <div class="desc">
                        {{ \Illuminate\Support\Str::limit($product->product_description ?? 'No description available', 60) }}
                    </div>

                    <a href="{{ route('product_details', $product->id) }}" class="btn">
                        View Details<br><br>
                    </a>

                </div>
                </center>

            @endforeach

        </div>

    @else
        <div class="no-result">
            <h3>No products found</h3>
            <p>Try searching with different keywords.</p>
        </div>
    @endif

</div>

</body>
</html>