<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login</title>

  <!-- Fonts -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{asset('css/swipper.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="icon" type="image/x-icon" href="{{asset('images/logosatu.svg')}}">
  <style>
    html, body {
      /* Mengatur tinggi dan lebar menjadi 100% */
      height: 100%;
      width: 100%;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 0;
    }
    
    body {
      /* Mengatur background image */
      background-image: url("images/kotabg.png");
      background-size: cover; /* Untuk mengatur ukuran gambar background */
      background-repeat: no-repeat; /* Untuk mencegah pengulangan gambar */
      background-position: center center; /* Untuk mengatur posisi gambar background */
    }

    .form_login {
      text-align: center;
    }
    
    /* Gaya CSS lainnya */
    
  </style>
</head>

<body>
  <div class="form_login">
    <img class="img_login " src="{{asset('images/logopilar2.svg')}}">
    <a href="{{route('google.login')}}" class="button_login">Login</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="{{asset('js/swipper-bundle.js')}}"></script>
  <script src="{{asset('js/script.js')}}"></script>
</body>


</html>