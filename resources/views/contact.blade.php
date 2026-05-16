<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            background: #f4f7fb;
        }

        .contact_section {
            min-height: 100vh;
            padding: 80px 20px;
            position: relative;
            overflow: hidden;
        }

        .contact_section::before{
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(0, 0, 0, 0.06);
            border-radius: 50%;
            top: -100px;
            left: -100px;
            filter: blur(80px);
        }

        .contact_section::after{
            content: '';
            position: absolute;
            width: 350px;
            height: 350px;
            background: rgba(0, 0, 0, 0.05);
            border-radius: 50%;
            bottom: -100px;
            right: -100px;
            filter: blur(80px);
        }

        .container{
            max-width: 1200px;
            margin: auto;
            position: relative;
            z-index: 2;
        }

        .heading_container{
            text-align: center;
            margin-bottom: 60px;
        }

        .heading_container h2 {
            font-size: 48px;
            font-weight: 800;
            color: #111;
            margin-bottom: 10px;
        }

        .heading_container p {
            color: #666;
            font-size: 17px;
        }

        .contact-wrapper{
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .contact-info{
            flex: 1;
            min-width: 300px;
            background: linear-gradient(135deg,#111,#2c2c2c);
            color: white;
            border-radius: 25px;
            padding: 45px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }

        .contact-info h3{
            font-size: 30px;
            margin-bottom: 25px;
        }

        .icon-box{
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .icon-box i{
            width: 50px;
            height: 50px;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-right: 15px;
            transition: 0.3s;
        }

        .icon-box:hover i{
            background: white;
            color: black;
            transform: scale(1.1);
        }

        .contact-card{
            flex: 1.5;
            min-width: 320px;
            background: rgba(255,255,255,0.8);
            backdrop-filter: blur(12px);
            border-radius: 25px;
            padding: 45px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        }

        .form-group{
            position: relative;
            margin-bottom: 30px;
        }

        .form-control{
            width: 100%;
            height: 60px;
            border-radius: 15px;
            border: 1px solid #ddd;
            background: transparent;
            padding: 20px 15px 0;
            font-size: 16px;
            transition: 0.3s;
            outline: none;
        }

        textarea.form-control{
            height: 150px;
            resize: none;
            padding-top: 25px;
        }

        .form-control:focus{
            border-color: #000;
            box-shadow: 0 0 15px rgba(0,0,0,0.08);
        }

        .form-group label{
            position: absolute;
            left: 15px;
            top: 18px;
            color: #888;
            transition: 0.3s;
            pointer-events: none;
            background: white;
            padding: 0 5px;
        }

        .form-control:focus + label,
        .form-control:not(:placeholder-shown) + label{
            top: -10px;
            font-size: 13px;
            color: #000;
        }

        .send-btn{
            width: 100%;
            border: none;
            padding: 16px;
            border-radius: 50px;
            background: linear-gradient(135deg,#111,#444);
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.4s ease;
        }

        .send-btn:hover{
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        @media(max-width:768px){

            .contact-wrapper{
                flex-direction: column;
            }

            .heading_container h2{
                font-size: 35px;
            }

            .contact-card,
            .contact-info{
                padding: 30px;
            }
        }

    </style>
</head>

<body>

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
                    <span>support@example.com</span>
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