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
    <h1 class="title-pesanan">Pesanan Pindahan ShortTrip</h1>
    <div class="navigation-riwayat draggable">
        <ul>
            <li class="active-2"> <a href="/orderpindahanshort"> Menunggu </a> </li>
            <li> <a href="/konfirmasi/pindahanshort"> Konfirmasi </a> </li>
            <li> <a href="/proses/pindahanshort"> Proses </a> </li>
            <li> <a href="/selesai/pindahanshort"> Selesai </a> </li>
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
            <img src="{{asset('images/pindahankeranjang.svg')}}" alt="" class="img-keranjang">
            <div class="text-keranjang">
                <h1 class="title-keranjang">
                    Pindahan ShortTrip
                </h1>
                <p class="p-keranjang">
                    Kota Asal : {{ $order->origin_provinsi }}, {{ $order->origin_kabupaten }}, {{
                    $order->origin_kecamatan }}, {{ $order->origin_kelurahan }}
                </p>
                <p class="p-keranjang">
                    Kota Tujuan : {{ $order->destinasi_provinsi }}, {{ $order->destinasi_kabupaten }}, {{
                    $order->destinasi_kecamatan }}, {{
                    $order->destinasi_kelurahan }}
                </p>
                <p class="p-keranjang">
                    Armada : {{ $order->armada }}
                </p>
                <p class="p-keranjang">
                    Helper : {{ $order->tkbm }}
                </p>
                <p class="p-keranjang" style="color: aquamarine;">
                    Harga : {{ number_format($order->harga, 0, ',', '.') }}
                </p>
                <p class="p-keranjang" style="color: orange;">
                    Status : Menunggu Pembayaran
                </p>
            </div>
            <div class="button-keranjang">
                <button class="upload-button" data-order-id="{{ $order->id }}">Upload</button>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    <!-- Modal untuk Mengunggah Gambar -->
    <div class="modal" id="uploadModal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Upload Gambar</h2>
            @if (!$keranjangOrders->isEmpty())
            <form id="uploadForm" action="{{ route('upload.image/pindahanshort', ['id' => $order]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="orderId" name="orderId" value="">
                <input type="hidden" value="konfirmasi" name="status">
                <input type="file" name="gambar" id="gambar" accept="image/*" required>
                <img id="gambarPreview" src="#" alt="Preview" style="max-width: 100%; max-height: 200px;">
                <button class="modalbtn" type="submit">Upload</button>
            </form>
            @else
            <p>Upload gambar tidak diizinkan karena data tidak tersedia.</p>
            @endif
        </div>
    </div>



    @include('layout.footer')
    <script>
        var modal = document.getElementById("uploadModal");
        var uploadButtons = document.querySelectorAll(".upload-button");
        var orderIdInput = document.getElementById("orderId");

        uploadButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var orderId = button.getAttribute("data-order-id");
                orderIdInput.value = orderId; // Mengisi nilai input tersembunyi
                modal.style.display = "block";
            });
        });

        closeModal.addEventListener("click", function() {
            modal.style.display = "none";
        });

        window.addEventListener("click", function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });

        var inputGambar = document.getElementById("gambar");

        var gambarPreview = document.getElementById("gambarPreview");

        inputGambar.addEventListener("change", function() {
            var file = inputGambar.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    gambarPreview.style.display = "block";
                    gambarPreview.src = e.target.result;
                };

                reader.readAsDataURL(file);
            } else {
                gambarPreview.style.display = "none";
                gambarPreview.src = "#";
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>


</html>