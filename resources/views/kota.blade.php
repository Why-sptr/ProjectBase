<!doctype html>
<html lang="en">

<head>
    <title>Indonesia</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <form action="/data" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="origin_provinsi">Origin Provinsi</label>
                    <select class="form-control" name="origin_provinsi" id="origin_provinsi" required>
                        <option>== Pilih Salah Satu ==</option>
                        @foreach ($provinces as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="origin_kabupaten">Origin Kabupaten</label>
                    <select class="form-control" name="origin_kabupaten" id="origin_kabupaten" required>
                        <option>== Pilih Salah Satu ==</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="origin_kecamatan">Origin Kecamatan</label>
                    <select class="form-control" name="origin_kecamatan" id="origin_kecamatan" required>
                        <option>== Pilih Salah Satu ==</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="destinasi_provinsi">Destinasi Provinsi</label>
                    <select class="form-control" name="destinasi_provinsi" id="destinasi_provinsi" required>
                        <option>== Pilih Salah Satu ==</option>
                        @foreach ($provinces as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="destinasi_kabupaten">Destinasi Kabupaten</label>
                    <select class="form-control" name="destinasi_kabupaten" id="destinasi_kabupaten" required>
                        <option>== Pilih Salah Satu ==</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="destinasi_kecamatan">Destinasi Kecamatan</label>
                    <select class="form-control" name="destinasi_kecamatan" id="destinasi_kecamatan" required>
                        <option>== Pilih Salah Satu ==</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="armada">Armada</label>
                    <select class="form-select" name="armada" aria-label="Default select example"  required>                            
                        <option selected>Pilih Armada</option>
                        <option value="PickUp">PickUp</option>
                        <option value="CDD">CDD</option>
                        <option value="CDE">CDE</option>
                        <option value="Fuso">Fuso</option>
                        <option value="Long">Long</option>
                        <option value="Box">Box</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="harga">Harga</label>
                    <input class="form-control" type="text" name="harga" id="harga" required>
                </div>
                <button class="btn btn-primary" type="submit">Tambah Data</button>
            </form>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $('#origin_provinsi').on('change', function () {
                var idProvinsi = $(this).val();
                if (idProvinsi) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('kabupaten') }}",
                        data: {
                            id_provinsi: idProvinsi
                        },
                        success: function (response) {
                            $('#origin_kabupaten').empty();
                            $('#origin_kecamatan').empty();
    
                            $('#origin_kabupaten').append('<option>== Pilih Salah Satu ==</option>');
                            $('#origin_kecamatan').append('<option>== Pilih Salah Satu ==</option>');
    
                            $.each(response, function (key, value) {
                                $('#origin_kabupaten').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        },
                        error: function (data) {
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
    
            $('#origin_kabupaten').on('change', function () {
                var idKabupaten = $(this).val();
                if (idKabupaten) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('kecamatan') }}",
                        data: {
                            id_kabupaten: idKabupaten
                        },
                        success: function (response) {
                            $('#origin_kecamatan').empty();
    
                            $('#origin_kecamatan').append('<option>== Pilih Salah Satu ==</option>');
    
                            $.each(response, function (key, value) {
                                $('#origin_kecamatan').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        },
                        error: function (data) {
                            console.log('error:', data);
                        }
                    });
                } else {
                    $('#origin_kecamatan').empty();
    
                    $('#origin_kecamatan').append('<option>== Pilih Salah Satu ==</option>');
                }
            });
    
            $('#destinasi_provinsi').on('change', function () {
                var idProvinsi = $(this).val();
                if (idProvinsi) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('kabupaten') }}",
                        data: {
                            id_provinsi: idProvinsi
                        },
                        success: function (response) {
                            $('#destinasi_kabupaten').empty();
                            $('#destinasi_kecamatan').empty();
    
                            $('#destinasi_kabupaten').append('<option>== Pilih Salah Satu ==</option>');
                            $('#destinasi_kecamatan').append('<option>== Pilih Salah Satu ==</option>');
    
                            $.each(response, function (key, value) {
                                $('#destinasi_kabupaten').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        },
                        error: function (data) {
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
    
            $('#destinasi_kabupaten').on('change', function () {
                var idKabupaten = $(this).val();
                if (idKabupaten) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('kecamatan') }}",
                        data: {
                            id_kabupaten: idKabupaten
                        },
                        success: function (response) {
                            $('#destinasi_kecamatan').empty();
    
                            $('#destinasi_kecamatan').append('<option>== Pilih Salah Satu ==</option>');
    
                            $.each(response, function (key, value) {
                                $('#destinasi_kecamatan').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        },
                        error: function (data) {
                            console.log('error:', data);
                        }
                    });
                } else {
                    $('#destinasi_kecamatan').empty();
    
                    $('#destinasi_kecamatan').append('<option>== Pilih Salah Satu ==</option>');
                }
            });
        });
    </script>
    



    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>