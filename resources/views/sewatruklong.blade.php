<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Cek Harga</title>

  <!-- Fonts -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>
  <nav class="navbar bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{asset('images/logopilar.svg')}}" alt="logopilar" width="200" height="50">
      </a>
    </div>
  </nav>

  <section id="header">
    <div class="container-header">
      <div class="text-header">
        <h1>Temukan Harga Tempat Tujuan Anda Dengan Cepat dan Terjangkau</h1>
        <h2>Dengan menggunakan jasa kami barang anda akan terjamin keamanannya</h2>
        <p>Anda mau sewa jasa apa nih? Pilih jasa kami dibawah ini untuk mengetahui lebih rinci harga setiap jasa yang
          anda pilih sesuai kebutuhan anda</p>

        <div class="flex-box">
          <div class="card">
            <a href="/pindahan">
              <div class="img">
                <img src="{{asset('images/pindahan.svg')}}">
              </div>
              <h4 class="title">Pindahan</h4>
              <h5 class="title">Pindahan Rumah, Kantor, Kosan. DLL.</h5>
            </a>
          </div>
          <div class="card active">
            <div class="img">
              <img src="{{asset('images/sewatruk.svg')}}">
            </div>
            <h4 class="title">Sewa Truk</h4>
            <h5 class="title">Sewa Truk, CDD, CDE, Fuso, DLL.</h5>
          </div>
          <div class="card">
            <a href="https://mauorder.online/pilar-utama-transindo-surabaya">
              <div class="img">
                <img src="{{asset('images/cargo.svg')}}">
              </div>
              <h4 class="title">Cargo</h4>
              <h5 class="title">Pindahan anda lebih Murah dan Terjangkau</h5>
            </a>
          </div>
        </div>

      </div>
      <div class="image">
        <img src="{{asset('images/fotomaps.svg')}}" alt="Gambar">
      </div>
    </div>

  </section>

  <section id="order">
    <div class="flex-button">
      <a href="#"><button><img src="{{asset('images/luarkota.svg')}}" class="img-button">Luar
          Kota</button></a>
      <a href="/cekongkirdalamkota"><button class="button2"><img src="{{asset('images/short.svg')}}" class="img-button">Dalam
          Kota</button></a>
    </div>

    <div class="row-all">
      <div class="container-form">
        <form action="/datas" method="POST">
          @csrf
          <div class="row">
            <div class="input-box">
              <span class="details">Kota Asal</span>
              <select class="input" name="origin_provinsi" id="origin_provinsi" required>
                <option>== Pilih Salah Satu ==</option>
                @foreach ($provinces as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
            <!-- Add this hidden input to store the ID -->
            <input type="hidden" id="dataId" value="">
            <div class="input-box">
              <span class="details">.</span>
              <select class="input" name="origin_kabupaten" id="origin_kabupaten" required>
                <option>== Pilih Salah Satu ==</option>
              </select>
            </div>
            <div class="input-box">
              <span class="details">.</span>
              <select class="input" name="origin_kecamatan" id="origin_kecamatan" required>
                <option>== Pilih Salah Satu ==</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="input-box">
              <span class="details">Kota Tujuan</span>
              <select class="input" name="destinasi_provinsi" id="destinasi_provinsi" required>
                <option>== Pilih Salah Satu ==</option>
                @foreach ($provinces as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="input-box">
              <span class="details">.</span>
              <select class="input" name="destinasi_kabupaten" id="destinasi_kabupaten" required>
                <option>== Pilih Salah Satu ==</option>
              </select>
            </div>
            <div class="input-box">
              <span class="details">.</span>
              <select class="input" name="destinasi_kecamatan" id="destinasi_kecamatan" required>
                <option>== Pilih Salah Satu ==</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="input-box-wide">
              <span class="details">Armada</span>
              <select class="input" name="armada" id="armada" required>
                <option>Pilih Armada</option>
                <option value="PickUp">PickUp</option>
                <option value="CDD">CDD</option>
                <option value="CDE">CDE</option>
                <option value="Fuso">Fuso</option>
                <option value="Long">Long</option>
                <option value="Box">Box</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="input-box-wide">
              <span class="details">Whatsapp</span>
              <input type="text" name="whatsapp" id="whatsapp" placeholder="Masukan Whatsapp" required>
            </div>
            <div class="flex-button">
              <a href="#"><button id="cekHargaBtn" class="button3"><img src="{{asset('images/cek.svg')}}" class="img-button">Cek
                  Harga</button></a>
            </div>
          </div>
        </form>
      </div>

      <div class="container-result">
        <div id="result-container" style="display: none;">
          <h1>Kota Asal</h1>
          <p>Provinsi: <span id="origin_provinsi_result"></span></p>
          <p>Kabupaten: <span id="origin_kabupaten_result"></span></p>
          <p>Kecamatan: <span id="origin_kecamatan_result"></span></p>
          <h1>Kota Tujuan</h1>
          <p>Provinsi: <span id="destinasi_provinsi_result"></span></p>
          <p>Kabupaten: <span id="destinasi_kabupaten_result"></span></p>
          <p>Kecamatan: <span id="destinasi_kecamatan_result"></span></p>
          <h1>Jenis Kendaraan</h1>
          <p>Armada: <span id="armada_result"></span></p>
          <h1>Total Harga</h1>
          <h2 id="harga_result"></h2>
        </div>
        <div class="flex-button" style="float: right;">
          <button type="submit" id="orderBtn" class="button">
            <img src="{{ asset('images/cek.svg') }}" class="img-button">
            Order
          </button>
        </div>

      </div>


  </section>
  <div class="armada">
    <h1 class="armada-h1">Pilih Armada Terbaik Kami Sesuai Kebutuhan Anda</h1>
    <p class="armada-p">Kami menyediakan berbagai armada yang siap melayani anda kapanpun dan dimanapun pengirimannya
    </p>
    <div class="flex-container">
      <div>
        <div class="title-berat">
          <img src="{{asset('images/pickup.svg')}}">
          <h4>PickUp</h4>
          <span>
            <img src="{{asset('images/berat.svg')}}" class="img-berat"><span class="berat" style="font-size: 18px; ">Kapasitas Berat : 1 Ton</span>
          </span>
        </div>

        <div class="column">
          <img src="{{asset('images/volume.svg')}}"><span style="font-size: 18px; font-weight: 200;">Volume : </span>
          <img src="{{asset('images/lebar.svg')}}"><span style="font-size: 18px; font-weight: 200;">Lebar : </span>
          <img src="{{asset('images/tinggi.svg')}}"><span style="font-size: 18px; font-weight: 200;">Tinggi : </span>
          <img src="{{asset('images/panjang.svg')}}"><span style="font-size: 18px; font-weight: 200;">Panjang : </span>
        </div>
      </div>
      <div>
        <div class="title-berat">
          <img src="{{asset('images/pickup.svg')}}">
          <h4>PickUp</h4>
          <span>
            <img src="{{asset('images/berat.svg')}}" class="img-berat"><span class="berat" style="font-size: 18px; ">Kapasitas Berat : 1 Ton</span>
          </span>
        </div>

        <div class="column">
          <img src="{{asset('images/volume.svg')}}"><span style="font-size: 18px; font-weight: 200;">Volume : </span>
          <img src="{{asset('images/lebar.svg')}}"><span style="font-size: 18px; font-weight: 200;">Lebar : </span>
          <img src="{{asset('images/tinggi.svg')}}"><span style="font-size: 18px; font-weight: 200;">Tinggi : </span>
          <img src="{{asset('images/panjang.svg')}}"><span style="font-size: 18px; font-weight: 200;">Panjang : </span>
        </div>
      </div>
      <div>
        <div class="title-berat">
          <img src="{{asset('images/pickup.svg')}}">
          <h4>PickUp</h4>
          <span>
            <img src="{{asset('images/berat.svg')}}" class="img-berat"><span class="berat" style="font-size: 18px; ">Kapasitas Berat : 1 Ton</span>
          </span>
        </div>

        <div class="column">
          <img src="{{asset('images/volume.svg')}}"><span style="font-size: 18px; font-weight: 200;">Volume : </span>
          <img src="{{asset('images/lebar.svg')}}"><span style="font-size: 18px; font-weight: 200;">Lebar : </span>
          <img src="{{asset('images/tinggi.svg')}}"><span style="font-size: 18px; font-weight: 200;">Tinggi : </span>
          <img src="{{asset('images/panjang.svg')}}"><span style="font-size: 18px; font-weight: 200;">Panjang : </span>
        </div>
      </div>
      <div>
        <div class="title-berat">
          <img src="{{asset('images/pickup.svg')}}">
          <h4>PickUp</h4>
          <span>
            <img src="{{asset('images/berat.svg')}}" class="img-berat"><span class="berat" style="font-size: 18px; ">Kapasitas Berat : 1 Ton</span>
          </span>
        </div>

        <div class="column">
          <img src="{{asset('images/volume.svg')}}"><span style="font-size: 18px; font-weight: 200;">Volume : </span>
          <img src="{{asset('images/lebar.svg')}}"><span style="font-size: 18px; font-weight: 200;">Lebar : </span>
          <img src="{{asset('images/tinggi.svg')}}"><span style="font-size: 18px; font-weight: 200;">Tinggi : </span>
          <img src="{{asset('images/panjang.svg')}}"><span style="font-size: 18px; font-weight: 200;">Panjang : </span>
        </div>
      </div>
      <div>
        <div class="title-berat">
          <img src="{{asset('images/pickup.svg')}}">
          <h4>PickUp</h4>
          <span>
            <img src="{{asset('images/berat.svg')}}" class="img-berat"><span class="berat" style="font-size: 18px; ">Kapasitas Berat : 1 Ton</span>
          </span>
        </div>

        <div class="column">
          <img src="{{asset('images/volume.svg')}}"><span style="font-size: 18px; font-weight: 200;">Volume : </span>
          <img src="{{asset('images/lebar.svg')}}"><span style="font-size: 18px; font-weight: 200;">Lebar : </span>
          <img src="{{asset('images/tinggi.svg')}}"><span style="font-size: 18px; font-weight: 200;">Tinggi : </span>
          <img src="{{asset('images/panjang.svg')}}"><span style="font-size: 18px; font-weight: 200;">Panjang : </span>
        </div>
      </div>

    </div>
  </div>

  <section id="us">
    <div class="row-us">
      <div class="container">
        <h1 class="us-title">100+</h1>
        <p class="us-text">Melayani lebih dari 100 Kota/Kabupaten di seluruh indonesia</p>
      </div>
      <div class="container">
        <h1 class="us-title">100+</h1>
        <p class="us-text">Dikelola lebih dari 100 ahli dalam bidang pengiriman</p>
      </div>
      <div class="container">
        <h1 class="us-title">20+</h1>
        <p class="us-text">Memiliki lebih dari 20 Armada pengiriman</p>
      </div>
    </div>
  </section>

  <footer>
    <div class="footer-content">

    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#origin_provinsi').on('change', function() {
        var idProvinsi = $(this).val();
        if (idProvinsi) {
          $.ajax({
            type: 'POST',
            url: "{{ route('kabupatencek') }}",
            data: {
              id_provinsi: idProvinsi
            },
            success: function(response) {
              $('#origin_kabupaten').empty();
              $('#origin_kecamatan').empty();

              $('#origin_kabupaten').append('<option>== Pilih Salah Satu ==</option>');
              $('#origin_kecamatan').append('<option>== Pilih Salah Satu ==</option>');

              $.each(response, function(key, value) {
                $('#origin_kabupaten').append('<option value="' + value.id + '">' + value.name + '</option>');
              });
            },
            error: function(data) {
              console.log('error:', data);
            }
          });
        } else {
          $('#origin_kabupaten').empty();
          $('#origin_kecamatan').empty();

          $('#origin_kabupaten').append('<option>== Pilih Salah Satu ==</option>');
          $('#origin_kecamatan').append('<option>== Pilih Salah Satu ==</option>');
        }
      });

      $('#origin_kabupaten').on('change', function() {
        var idKabupaten = $(this).val();
        if (idKabupaten) {
          $.ajax({
            type: 'POST',
            url: "{{ route('kecamatancek') }}",
            data: {
              id_kabupaten: idKabupaten
            },
            success: function(response) {
              $('#origin_kecamatan').empty();

              $('#origin_kecamatan').append('<option>== Pilih Salah Satu ==</option>');

              $.each(response, function(key, value) {
                $('#origin_kecamatan').append('<option value="' + value.id + '">' + value.name + '</option>');
              });
            },
            error: function(data) {
              console.log('error:', data);
            }
          });
        } else {
          $('#origin_kecamatan').empty();

          $('#origin_kecamatan').append('<option>== Pilih Salah Satu ==</option>');
        }
      });

      $('#destinasi_provinsi').on('change', function() {
        var idProvinsi = $(this).val();
        if (idProvinsi) {
          $.ajax({
            type: 'POST',
            url: "{{ route('kabupatencek') }}",
            data: {
              id_provinsi: idProvinsi
            },
            success: function(response) {
              $('#destinasi_kabupaten').empty();
              $('#destinasi_kecamatan').empty();

              $('#destinasi_kabupaten').append('<option>== Pilih Salah Satu ==</option>');
              $('#destinasi_kecamatan').append('<option>== Pilih Salah Satu ==</option>');

              $.each(response, function(key, value) {
                $('#destinasi_kabupaten').append('<option value="' + value.id + '">' + value.name + '</option>');
              });
            },
            error: function(data) {
              console.log('error:', data);
            }
          });
        } else {
          $('#destinasi_kabupaten').empty();
          $('#destinasi_kecamatan').empty();

          $('#destinasi_kabupaten').append('<option>== Pilih Salah Satu ==</option>');
          $('#destinasi_kecamatan').append('<option>== Pilih Salah Satu ==</option>');
        }
      });

      $('#destinasi_kabupaten').on('change', function() {
        var idKabupaten = $(this).val();
        if (idKabupaten) {
          $.ajax({
            type: 'POST',
            url: "{{ route('kecamatancek') }}",
            data: {
              id_kabupaten: idKabupaten
            },
            success: function(response) {
              $('#destinasi_kecamatan').empty();

              $('#destinasi_kecamatan').append('<option>== Pilih Salah Satu ==</option>');

              $.each(response, function(key, value) {
                $('#destinasi_kecamatan').append('<option value="' + value.id + '">' + value.name + '</option>');
              });
            },
            error: function(data) {
              console.log('error:', data);
            }
          });
        } else {
          $('#destinasi_kecamatan').empty();

          $('#destinasi_kecamatan').append('<option>== Pilih Salah Satu ==</option>');
        }
      });

      var dataId;

      $('#cekHargaBtn').on('click', function(e) {
        e.preventDefault();

        // Mengambil data dari form
        var originProvinsi = $('#origin_provinsi option:selected').text();
        var originKabupaten = $('#origin_kabupaten option:selected').text();
        var originKecamatan = $('#origin_kecamatan option:selected').text();
        var armada = $('#armada').val();
        var destinasiProvinsi = $('#destinasi_provinsi option:selected').text();
        var destinasiKabupaten = $('#destinasi_kabupaten option:selected').text();
        var destinasiKecamatan = $('#destinasi_kecamatan option:selected').text();
        var whatsapp = $('#whatsapp').val();

        console.log(originProvinsi, originKabupaten, originKecamatan, armada, whatsapp, destinasiProvinsi, destinasiKabupaten, destinasiKecamatan);

        // Mengirim data ke server
        $.ajax({
          type: 'POST',
          url: '/datas',
          data: {
            origin_provinsi: originProvinsi,
            origin_kabupaten: originKabupaten,
            origin_kecamatan: originKecamatan,
            armada: armada,
            destinasi_provinsi: destinasiProvinsi,
            destinasi_kabupaten: destinasiKabupaten,
            destinasi_kecamatan: destinasiKecamatan,
            whatsapp: whatsapp,
          },
          success: function(response) {
            // Mengisi data ke elemen-elemen "container-result"
            $('#result-container').show();
            $('#origin_provinsi_result').text(originProvinsi);
            $('#origin_kabupaten_result').text(originKabupaten);
            $('#origin_kecamatan_result').text(originKecamatan);
            $('#destinasi_provinsi_result').text(destinasiProvinsi);
            $('#destinasi_kabupaten_result').text(destinasiKabupaten);
            $('#destinasi_kecamatan_result').text(destinasiKecamatan);
            $('#armada_result').text(armada);

            // Simpan ID yang diterima ke dalam variabel dataId
            dataId = response.id;
            // Cek jika harga ditemukan atau tidak
            if (response.harga) {
              $('#harga_result').text(response.harga);
            } else {
              $('#harga_result').text('Hubungi Lebih Lanjut');
            }
          },
          error: function(error) {
            console.log('Error:', error);
          }
        });
      });

      $('#orderBtn').on('click', function(e) {
        e.preventDefault();

        // Periksa apakah dataId memiliki nilai yang valid
        if (dataId) {
          // Redirect ke halaman stepper dengan menggunakan dataId sebagai parameter
          window.location.href = '/orderstep/' + dataId;
        } else {
          console.log('Data ID tidak ditemukan.');
        }
      });




    });
  </script>


</body>


</html>