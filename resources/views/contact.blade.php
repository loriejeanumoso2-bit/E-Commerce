<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('admin/css/contact.css')}}">
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
    <a href="{{ route('why_us') }}">WHY US</a>
    <a href="{{ route('contact_us') }}" class="active">CONTACT US</a>

    <div class="icons">
      <a href="{{route('login')}}"><i class="fa-solid fa-user"></i> Login</a>
      <a href="{{route('cartproducts')}}"><i class="fa-solid fa-bag-shopping"></i></a>
      <a href="{{ route('search')}}"><i class="fa-solid fa-magnifying-glass"></i></a>
    </div>
  </nav>

<section class="contact_section">

    <div class="container">

        <div class="heading_container">
            <h2>Contact Us</h2>
            <p>We would love to hear from you. Send us your message anytime.</p>
        </div>

        <div class="contact-wrapper">

            <!-- Contact Info -->
            <div class="contact-info">

                <h3>Get In Touch</h3>

                <div class="icon-box">
                    <i class="fa fa-map-marker-alt"></i>
                    <span>Tabaco City, Albay</span>
                </div>

                <div class="icon-box">
                    <i class="fa fa-phone"></i>
                    <span>+63 956 466 0294</span>
                </div>

                <div class="icon-box">
                    <i class="fa fa-envelope"></i>
                    <span>Ceaisboutique@gmail.com</span>
                </div>

            </div>

            <!-- Contact Form -->
            <div class="contact-card">

                @if(session('success'))
                    <div style="
                        background:#d4edda;
                        color:#155724;
                        padding:15px;
                        margin-bottom:20px;
                        border-radius:10px;
                    ">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <input type="text"
                        name="name"
                        class="form-control"
                        placeholder=" "
                        required>

                        <label>Your Name</label>
                    </div>

                    <div class="form-group">
                        <input type="email"
                        name="email"
                        class="form-control"
                        placeholder=" "
                        required>

                        <label>Your Email</label>
                    </div>

                    <div class="form-group">
                        <input type="text"
                        name="phone"
                        class="form-control"
                        placeholder=" "
                        required>

                        <label>Phone Number</label>
                    </div>

                    <div class="form-group">
                        <textarea
                        name="message"
                        class="form-control"
                        placeholder=" "
                        required></textarea>

                        <label>Your Message</label>
                    </div>

                    <button type="submit" class="send-btn">
                        SEND MESSAGE
                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

</body>
</html>