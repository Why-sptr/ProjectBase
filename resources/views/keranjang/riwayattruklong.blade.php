<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Riwayat</title>

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="{{asset('css/swipper.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/x-icon" href="{{asset('images/logosatu.svg')}}">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
</head>

<body>
    @include('layout.navbar')
    <div class="navigation-riwayat draggable">
        <ul>
            <li class="active-2"> <a href="/riwayat"> Sewa Truk LongTrip </a> </li>
            <li> <a href="/riwayattrukshort"> Sewa Truk ShortTrip </a> </li>
            <li> <a href="/riwayatpindahanlong"> Pindahan LongTrip </a> </li>
            <li> <a href="/riwayatpindahanshort"> Pindahan ShortTrip </a> </li>
        </ul>
    </div>
    @if ($keranjangOrders->isEmpty())
    <div class="notfound" style="margin-top: 50px; justify-content: center; display: flex;">
        <div class="text-notfound" style="align-items: center; justify-content: center; text-align: center;">
            <img src="{{asset('images/error.svg')}}" alt="" style="max-height: 200px;">
            <h1>Data tidak tersedia.</h1>
            <p style="max-width: 800px;">Anda belum melakukan pemesanan apapun, silahkan lakukan pemesanan untuk melihat isi keranjang pesanan
                anda.</p>
        </div>
    </div>
    @else
    @foreach ($keranjangOrders as $order)
    <div class="item-keranjang">
        <div class="card-keranjang">
            <img src="{{asset('images/sewatrukkeranjang.svg')}}" alt="" class="img-keranjang">
            <div class="text-keranjang">
                <h1 class="title-keranjang">
                    Sewa Truk LongTrip
                </h1>
                <p class="p-keranjang">
                    Kota Asal : {{ $order->origin_provinsi }}, {{ $order->origin_kabupaten }}, {{ $order->origin_kecamatan }}
                </p>
                <p class="p-keranjang">
                    Kota Tujuan : {{ $order->destinasi_provinsi }}, {{ $order->destinasi_kabupaten }}, {{ $order->destinasi_kecamatan }}
                </p>
                <p class="p-keranjang">
                    Armada : {{ $order->armada }}
                </p>
                <p class="p-keranjang" style="color: aquamarine;">
                    Harga : {{ $order->harga }}
                </p>
            </div>
            <div class="button-keranjang">
                @if ($order->harga != 0)
                <a href="{{ route('orderstep', ['id' => $order->id]) }}"><button id="orderBtn">Order</button></a>
                @else
                <a href="https://mauorder.online/pilar-utama-transindo-surabaya"><button id="orderBtn">Order</button></a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
    @endif

    @include('layout.footer')

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>


</html>