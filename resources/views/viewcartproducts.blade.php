<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="{{asset('admin/css/cartproducts.css')}}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <div class="cart-container">

        <a href="{{ route('index') }}" class="back-link">
            ← Back to Products
        </a>

        @if(session('confirm_order'))
            <div class="success-message">
                {{ session('confirm_order') }}
            </div>
        @endif

        <!-- CART -->
        <div class="cart-box">

            <div class="cart-header">
                <div>Product</div>
                <div>Price</div>
                <div>Quantity</div>
                <div>Action</div>
            </div>

            @php
                $price = 0;
            @endphp

            @foreach ($cart as $cart_product)

            <div class="cart-item">

                <div class="product-info">

                    <img class="product-image"
                    src="{{ asset('product/'.$cart_product->product->product_image) }}">

                    <div class="product-title">
                        {{ $cart_product->product->product_title }}
                    </div>

                </div>

                <div class="price">
                    ₱{{ $cart_product->product->product_prices }}
                </div>

                <div class="quantity-box">

                <a class="qty-btn"
                href="{{ route('decrease_quantity', $cart_product->id) }}">
                    -
                </a>

                <span class="qty-number">
                    {{ $cart_product->quantity }}
                </span>

                <a class="qty-btn"
                href="{{ route('increase_quantity', $cart_product->id) }}">
                    +
                </a>

                </div>
                <div>
                    <a class="remove-btn"
                    href="{{ route('removecartproducts',$cart_product->id) }}"
                    onclick="return confirm('Are you sure?')">
                        Remove
                    </a>
                </div>

            </div>

            @php
               $price += $cart_product->product->product_prices * $cart_product->quantity;
            @endphp

            @endforeach

        </div>

        <!-- TOTAL -->
        <div class="total-box">

            <div class="total-text">
                Total:
            </div>

            <div class="total-price">
                ₱{{ $price }}
            </div>

        </div>

        <!-- CHECKOUT -->
        <div class="checkout-box">

            <div class="checkout-title">
                Checkout Information
            </div>

            <form action="{{ route('confirm_order') }}" method="POST">

                @csrf

                <textarea
                    class="input-field"
                    name="Receiver_address"
                    rows="4"
                    placeholder="Enter complete address..."
                    required></textarea>

                <input
                    class="input-field"
                    type="text"
                    name="Receiver_phone"
                    placeholder="Enter phone number..."
                    required>

                <button class="confirm-btn" type="submit">
                    Confirm Order
                </button>

            </form>

        </div>

    </div>

</body>
</html>