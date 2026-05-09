<DOCTYPE html>

<html lang="en">
    <head> 
        <meta charset="utf-8">
        <meta  name="viewport" content="widthdevice-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <center>
        Customer Name:{{$data->user->name}}<br><br><br><br>
        Customer Address:{{$data->Receiver_address}}<br><br><br><br>
        Customer Phone:{{$data->Receiver_phone}}<br><br><br><br>
        Product:{{$data->product->product_title}}<br><br><br><br>
        Product price:{{$data->product->product_prices}}<br><br><br><br>
        </center>
    </body>
    </html>