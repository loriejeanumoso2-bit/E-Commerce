<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cea is Boutique</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <link rel="stylesheet" href="{{asset('admin/css/why_us.css')}}">
</head>
<body>

  <!-- HEADER -->
  <div class="header">
    <div class="logo">Cea is Boutique</div>
  </div>

  <!-- NAVBAR -->
  <nav class="navbar">
    <a href="{{ route('index') }}">HOME</a>
    <a href="{{ route('viewallproducts') }}">SHOP</a>
    <a href="{{ route('why_us') }}" class="active">WHY US</a>
    <a href="{{ route('contact_us') }}">CONTACT US</a>

    <div class="icons">
      <a href="{{route('login')}}"><i class="fa-solid fa-user"></i> Login</a>
      <a href="{{route('cartproducts')}}"><i class="fa-solid fa-bag-shopping"></i></a>
      <a href="{{ route('search')}}"><i class="fa-solid fa-magnifying-glass"></i></a>
    </div>
  </nav>

  <!-- WHY SHOP WITH US -->
  <section class="why-section">

    <h1>WHY SHOP WITH US</h1>

    <div class="card-container">

      <!-- CARD 1 -->
<div class="card">
  <i class="fa-solid fa-truck"></i>
  <h2>Fast Delivery</h2>
  <p>
    We deliver your orders quickly and safely right to your doorstep.
  </p>
</div>

<!-- CARD 2 -->
<div class="card">
  <i class="fa-regular fa-circle-check"></i>
  <h2>Free Shipping</h2>
  <p>
    Enjoy free shipping on selected products with no hidden charges.
  </p>
</div>

<!-- CARD 3 -->
<div class="card">
  <i class="fa-solid fa-award"></i>
  <h2>Best Quality</h2>
  <p>
    We provide high-quality products that meet customer satisfaction.
  </p>
</div>
    </div>

  </section>

  <!-- FOOTER BAR -->
  <div class="footer-bar"></div>

</body>
</html>