<div>
    <form wire:submit.prevent="updateorder">
        <div>

            @if($currentStep == 1)

            <!-- Step 1 -->
            <div class="row">
                <!-- Stepper Progress Bar -->
                <div class="col-md-12" style="margin-top: 50px;">
                    <div class="container-fluid p-2 align-items-center">
                        <div class="d-flex justify-content-around">
                            <button class="btn bg-info text-white btn-sm rounded-pill" style="width: 2rem; height: 2rem"
                                data-bs-toggle="collapse" data-bs-target="#company1" aria-expanded="true"
                                aria-controls="company1" onclick="stepFunction(event)">
                                1
                            </button>
                            <span class="bg-secondary w-25 rounded mt-auto mb-auto me-1 ms-1" style="height: 0.2rem">
                            </span>
                            <button class="btn bg-secondary text-white btn-sm rounded-pill"
                                style="width: 2rem; height: 2rem" data-bs-toggle="collapse" data-bs-target="#company2"
                                aria-expanded="false" aria-controls="company3" onclick="stepFunction(event)">
                                2
                            </button>
                            <span class="bg-secondary w-25 rounded mt-auto mb-auto me-1 ms-1" style="height: 0.2rem">
                            </span>
                            <button class="btn bg-secondary text-white btn-sm rounded-pill"
                                style="width: 2rem; height: 2rem" data-bs-toggle="collapse" data-bs-target="#company3"
                                aria-expanded="false" aria-controls="company3" onclick="stepFunction(event)">
                                3
                            </button>
                            <span class="bg-secondary w-25 rounded mt-auto mb-auto me-1 ms-1" style="height: 0.2rem">
                            </span>
                            <button class="btn bg-secondary text-white btn-sm rounded-pill"
                                style="width: 2rem; height: 2rem" data-bs-toggle="collapse" data-bs-target="#company4"
                                aria-expanded="false" aria-controls="company4" onclick="stepFunction(event)">
                                4
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 100px; justify-content: space-between;">
                <div class="col">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Customer</label>
                        <input type="text" style="min-height: 60px; border-radius: 20px;"
                            placeholder="Masukan Nama Anda" class="form-control" id="" aria-describedby="emailHelp"
                            wire:model="nama">
                        <span class="text-danger">@error('nama'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email Customer</label>
                        <input type="email" style="min-height: 60px; border-radius: 20px;"
                            placeholder="Masukan Email Anda" class="form-control" id="" aria-describedby="emailHelp"
                            wire:model="email">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="whatsapp" class="form-label">No Whatsapp</label>
                        <input type="text" style="min-height: 60px; border-radius: 20px;" placeholder="Masukan No Anda"
                            class="form-control" id="" aria-describedby="emailHelp" wire:model="whatsapp">
                        <span class="text-danger">@error('whatsapp'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-4 imagestepper d-none d-lg-block">
                    <img src="{{asset ('images/step1.svg')}}" style="height: 500px; display: block; margin-top: -60px;">
                </div>
            </div>
            @endif

            @if($currentStep == 2)

            <!-- Step 2 -->
            <div class="row">
                <!-- Stepper Progress Bar -->
                <div class="col-md-12" style="margin-top: 50px;">
                    <div class="container-fluid p-2 align-items-center">
                        <div class="d-flex justify-content-around">
                            <button class="btn bg-info text-white btn-sm rounded-pill" style="width: 2rem; height: 2rem"
                                data-bs-toggle="collapse" data-bs-target="#company1" aria-expanded="true"
                                aria-controls="company1" onclick="stepFunction(event)">
                                1
                            </button>
                            <span class="bg-info w-25 rounded mt-auto mb-auto me-1 ms-1" style="height: 0.2rem">
                            </span>
                            <button class="btn bg-info text-white btn-sm rounded-pill" style="width: 2rem; height: 2rem"
                                data-bs-toggle="collapse" data-bs-target="#company2" aria-expanded="false"
                                aria-controls="company3" onclick="stepFunction(event)">
                                2
                            </button>
                            <span class="bg-secondary w-25 rounded mt-auto mb-auto me-1 ms-1" style="height: 0.2rem">
                            </span>
                            <button class="btn bg-secondary text-white btn-sm rounded-pill"
                                style="width: 2rem; height: 2rem" data-bs-toggle="collapse" data-bs-target="#company3"
                                aria-expanded="false" aria-controls="company3" onclick="stepFunction(event)">
                                3
                            </button>
                            <span class="bg-secondary w-25 rounded mt-auto mb-auto me-1 ms-1" style="height: 0.2rem">
                            </span>
                            <button class="btn bg-secondary text-white btn-sm rounded-pill"
                                style="width: 2rem; height: 2rem" data-bs-toggle="collapse" data-bs-target="#company4"
                                aria-expanded="false" aria-controls="company4" onclick="stepFunction(event)">
                                4
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 100px;">
                <h3>LENGKAPI DATA CUSTOMER</h3>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Provinsi Rumah</label>
                        <input type="text" style="min-height: 60px; border-radius: 20px;"
                            placeholder="Masukan Provinsi Rumah Anda" class="form-control" id=""
                            aria-describedby="emailHelp" wire:model="home_provinsi">
                        <span class="text-danger">@error('home_provinsi'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Kabupaten Rumah</label>
                        <input type="text" style="min-height: 60px; border-radius: 20px;"
                            placeholder="Masukan Kabupaten Rumah Anda" class="form-control" id=""
                            aria-describedby="emailHelp" wire:model="home_kabupaten">
                        <span class="text-danger">@error('home_kabupaten'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Kecamatan Rumah</label>
                        <input type="text" style="min-height: 60px; border-radius: 20px;"
                            placeholder="Masukan Kecamatan Rumah Anda" class="form-control" id=""
                            aria-describedby="emailHelp" wire:model="home_kecamatan">
                        <span class="text-danger">@error('home_kecamatan'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="floatingTextarea2">Detail Alamat</label>
                        <textarea class="form-control" placeholder="Masukan detail alamat lengkap anda"
                            placeholder="Masukan Detail Alamat Rumah Anda" id=""
                            style="height: 150px; border-radius: 20px;" wire:model="detail_alamat_home"></textarea>
                        <span class="text-danger">@error('detail_alamat_home'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-4 imagestepper d-none d-lg-block">
                    <img src="{{asset ('images/step1.svg')}}" style="height: 500px; display: block; margin-top: -60px;">
                </div>
            </div>
            @endif

            @if($currentStep == 3)

            <!-- Step 3 -->
            <div class="row">
                <!-- Stepper Progress Bar -->
                <div class="col-md-12" style="margin-top: 50px;">
                    <div class="container-fluid p-2 align-items-center">
                        <div class="d-flex justify-content-around">
                            <button class="btn bg-info text-white btn-sm rounded-pill" style="width: 2rem; height: 2rem"
                                data-bs-toggle="collapse" data-bs-target="#company1" aria-expanded="true"
                                aria-controls="company1" onclick="stepFunction(event)">
                                1
                            </button>
                            <span class="bg-info w-25 rounded mt-auto mb-auto me-1 ms-1" style="height: 0.2rem">
                            </span>
                            <button class="btn bg-info text-white btn-sm rounded-pill" style="width: 2rem; height: 2rem"
                                data-bs-toggle="collapse" data-bs-target="#company2" aria-expanded="false"
                                aria-controls="company3" onclick="stepFunction(event)">
                                2
                            </button>
                            <span class="bg-info w-25 rounded mt-auto mb-auto me-1 ms-1" style="height: 0.2rem">
                            </span>
                            <button class="btn bg-info text-white btn-sm rounded-pill" style="width: 2rem; height: 2rem"
                                data-bs-toggle="collapse" data-bs-target="#company3" aria-expanded="false"
                                aria-controls="company3" onclick="stepFunction(event)">
                                3
                            </button>
                            <span class="bg-secondary w-25 rounded mt-auto mb-auto me-1 ms-1" style="height: 0.2rem">
                            </span>
                            <button class="btn bg-secondary text-white btn-sm rounded-pill"
                                style="width: 2rem; height: 2rem" data-bs-toggle="collapse" data-bs-target="#company4"
                                aria-expanded="false" aria-controls="company4" onclick="stepFunction(event)">
                                4
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 100px;">
                <div class="col">
                    <h3>ALAMAT ASAL (ORIGIN)</h3>
                    <table>
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="disabledTextInput" class="form-label">Provinsi Asal</label>
                                        <input type="text" id="disabledTextInput"
                                            style="min-height: 60px; border-radius: 20px; background-color: #d6d6d6;"
                                            class="form-control" placeholder="Disabled input"
                                            wire:model="origin_provinsi">
                                        <span class="text-danger">@error('origin_provinsi'){{ $message
                                            }}@enderror</span>
                                    </fieldset>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="disabledTextInput" class="form-label">Kabupaten Asal</label>
                                        <input type="text" id="disabledTextInput"
                                            style="min-height: 60px; border-radius: 20px; background-color: #d6d6d6;"
                                            class="form-control" placeholder="Disabled input"
                                            wire:model="origin_kabupaten">
                                        <span class="text-danger">@error('origin_kabupaten'){{ $message
                                            }}@enderror</span>
                                    </fieldset>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="disabledTextInput" class="form-label">Kecamatan Asal</label>
                                        <input type="text" id="disabledTextInput"
                                            style="min-height: 60px; border-radius: 20px; background-color: #d6d6d6;"
                                            class="form-control" placeholder="Disabled input"
                                            wire:model="origin_kecamatan">
                                        <span class="text-danger">@error('origin_kecamatan'){{ $message
                                            }}@enderror</span>
                                    </fieldset>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <div class="mb-3">
                        <label for="floatingTextarea2">Detail Alamat</label>
                        <textarea class="form-control" placeholder="Masukan Detail Alamat Kota Asal" id=""
                            style="min-height: 150px; border-radius: 20px;"
                            wire:model="detail_alamat_origin"></textarea>
                        <span class="text-danger">@error('detail_alamat_origin'){{ $message }}@enderror</span>
                    </div>
                    <div class="md-form md-outline input-with-post-icon datepicker" id="accLabels">
                        <label for="date">Rencana Kirim</label>
                        <input placeholder="Select date" type="date" id="date"
                            style="min-height: 60px; border-radius: 20px;" class="form-control"
                            wire:model="rencana_kirim">
                        <i class="fas fa-calendar input-prefix" tabindex=0></i>
                        <span class="text-danger">@error('rencana_kirim'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Jenis Kendaraan</label>
                        <input style="min-height: 60px; border-radius: 20px; background-color: #d6d6d6;"
                            class="form-control" type="text" placeholder="Disabled input"
                            aria-label="Disabled input example" disabled wire:model="armada">
                        <span class="text-danger">@error('armada'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col">
                    <h3>ALAMAT TUJUAN (DESTINASI)</h3>
                    <table>
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="disabledTextInput" class="form-label">Provinsi Tujuan</label>
                                        <input type="text" id="disabledTextInput"
                                            style="min-height: 60px; border-radius: 20px; background-color: #d6d6d6;"
                                            class="form-control" placeholder="Disabled input"
                                            wire:model="destinasi_provinsi">
                                        <span class="text-danger">@error('destinasi_provinsi'){{ $message
                                            }}@enderror</span>
                                    </fieldset>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="disabledTextInput" class="form-label">Kabupaten Tujuan</label>
                                        <input type="text" id="disabledTextInput"
                                            style="min-height: 60px; border-radius: 20px; background-color: #d6d6d6;"
                                            class="form-control" placeholder="Disabled input"
                                            wire:model="destinasi_kabupaten">
                                        <span class="text-danger">@error('destinasi_kabupaten'){{ $message
                                            }}@enderror</span>
                                    </fieldset>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="disabledTextInput" class="form-label">Kecamatan Tujuan</label>
                                        <input type="text" id="disabledTextInput"
                                            style="min-height: 60px; border-radius: 20px; background-color: #d6d6d6;"
                                            class="form-control" placeholder="Disabled input"
                                            wire:model="destinasi_kecamatan">
                                        <span class="text-danger">@error('destinasi_kecamatan'){{ $message
                                            }}@enderror</span>
                                    </fieldset>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <div class="mb-3">
                        <label for="floatingTextarea2">Detail Alamat</label>
                        <textarea class="form-control" placeholder="Masukan Detail Alamat Tujuan Kota Anda" id=""
                            style="min-height: 150px; border-radius: 20px;"
                            wire:model="detail_alamat_destinasi"></textarea>
                        <span class="text-danger">@error('detail_alamat_destinasi'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="paket" class="form-label">Paket</label>
                        <select id="paket" class="form-select" style="min-height: 60px; border-radius: 20px;"
                            wire:model="paket" wire:change="hitungHarga">
                            <option value="">Pilih Paket</option>
                            <option value="1">Paket Simple</option>
                            <option value="2">Paket Platinum</option>
                            <option value="3">Paket All In</option>
                            <!-- Tambahkan opsi-opsi lainnya sesuai kebutuhan -->
                        </select>
                        <span class="text-danger">@error('paket'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>
            @endif

            @if($currentStep == 4)

            <!-- Step 4 -->
            <div class="row">
                <!-- Stepper Progress Bar -->
                <div class="col-md-12" style="margin-top: 50px;">
                    <div class="container-fluid p-2 align-items-center">
                        <div class="d-flex justify-content-around">
                            <button class="btn bg-info text-white btn-sm rounded-pill" style="width: 2rem; height: 2rem"
                                data-bs-toggle="collapse" data-bs-target="#company1" aria-expanded="true"
                                aria-controls="company1" onclick="stepFunction(event)">
                                1
                            </button>
                            <span class="bg-info w-25 rounded mt-auto mb-auto me-1 ms-1" style="height: 0.2rem">
                            </span>
                            <button class="btn bg-info text-white btn-sm rounded-pill" style="width: 2rem; height: 2rem"
                                data-bs-toggle="collapse" data-bs-target="#company2" aria-expanded="false"
                                aria-controls="company3" onclick="stepFunction(event)">
                                2
                            </button>
                            <span class="bg-info w-25 rounded mt-auto mb-auto me-1 ms-1" style="height: 0.2rem">
                            </span>
                            <button class="btn bg-info text-white btn-sm rounded-pill" style="width: 2rem; height: 2rem"
                                data-bs-toggle="collapse" data-bs-target="#company3" aria-expanded="false"
                                aria-controls="company3" onclick="stepFunction(event)">
                                3
                            </button>
                            <span class="bg-info w-25 rounded mt-auto mb-auto me-1 ms-1" style="height: 0.2rem">
                            </span>
                            <button class="btn bg-info text-white btn-sm rounded-pill" style="width: 2rem; height: 2rem"
                                data-bs-toggle="collapse" data-bs-target="#company4" aria-expanded="false"
                                aria-controls="company4" onclick="stepFunction(event)">
                                4
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 100px;">
                <h3>Ringkasan Pesanan</h3>
                <div class="col">
                    <table>
                        <tr>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Customer</label>
                                <input type="text" style="min-height: 60px; border-radius: 20px;"
                                    placeholder="Masukan Nama Anda" class="form-control" id=""
                                    aria-describedby="emailHelp" wire:model="nama">
                                <span class="text-danger">@error('nama'){{ $message }}@enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email Customer</label>
                                <input type="email" style="min-height: 60px; border-radius: 20px;"
                                    placeholder="Masukan Email Anda" class="form-control" id=""
                                    aria-describedby="emailHelp" wire:model="email">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="whatsapp" class="form-label">No Whatsapp</label>
                                <input type="text" style="min-height: 60px; border-radius: 20px;"
                                    placeholder="Masukan No Anda" class="form-control" id=""
                                    aria-describedby="emailHelp" wire:model="whatsapp">
                                <span class="text-danger">@error('whatsapp'){{ $message }}@enderror</span>
                            </div>
                            <td>
                                <div class="mb-3">
                                    <label for="" class="form-label">Provinsi Rumah</label>
                                    <input type="text" style="min-height: 60px; border-radius: 20px;"
                                        placeholder="Masukan Provinsi Rumah Anda" class="form-control" id=""
                                        aria-describedby="emailHelp" wire:model="home_provinsi">
                                    <span class="text-danger">@error('home_provinsi'){{ $message }}@enderror</span>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <label for="" class="form-label">Kabupaten Rumah</label>
                                    <input type="text" style="min-height: 60px; border-radius: 20px;"
                                        placeholder="Masukan Kabupaten Rumah Anda" class="form-control" id=""
                                        aria-describedby="emailHelp" wire:model="home_kabupaten">
                                    <span class="text-danger">@error('home_kabupaten'){{ $message }}@enderror</span>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <label for="" class="form-label">Kecamatan Rumah</label>
                                    <input type="text" style="min-height: 60px; border-radius: 20px;"
                                        placeholder="Masukan Kecamatan Rumah Anda" class="form-control" id=""
                                        aria-describedby="emailHelp" wire:model="home_kecamatan">
                                    <span class="text-danger">@error('home_kecamatan'){{ $message }}@enderror</span>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="mb-3">
                        <label for="floatingTextarea2">Detail Alamat</label>
                        <textarea class="form-control" placeholder="Masukan Detail Alamat Rumah Anda"
                            placeholder="Masukan Detail Alamat Rumah Anda" id=""
                            style="height: 150px; border-radius: 20px;" wire:model="detail_alamat_home"></textarea>
                        <span class="text-danger">@error('detail_alamat_home'){{ $message }}@enderror</span>
                    </div>

                    <div class="md-form md-outline input-with-post-icon datepicker" id="accLabels">
                        <label for="date">Rencana Kirim</label>
                        <input placeholder="Select date" type="date" id="date"
                            style="min-height: 60px; border-radius: 20px;" class="form-control"
                            placeholder="Pilih Jadwal Pengiriman" wire:model="rencana_kirim">
                        <i class="fas fa-calendar input-prefix" tabindex=0></i>
                        <span class="text-danger">@error('rencana_kirim'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Jenis Kendaraan</label>
                        <input style="min-height: 60px; border-radius: 20px;" class="form-control" type="text"
                            placeholder="Disabled input" aria-label="Disabled input example" disabled
                            wire:model="armada">
                        <span class="text-danger">@error('armada'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col">
                    <h3>.</h3>
                    <table>
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="disabledTextInput" class="form-label">Provinsi Asal</label>
                                        <input type="text" id="disabledTextInput"
                                            style="min-height: 60px; border-radius: 20px;" class="form-control"
                                            placeholder="Disabled input" wire:model="origin_provinsi">
                                        <span class="text-danger">@error('origin_provinsi'){{ $message
                                            }}@enderror</span>
                                    </fieldset>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="disabledTextInput" class="form-label">Kabupaten Asal</label>
                                        <input type="text" id="disabledTextInput"
                                            style="min-height: 60px; border-radius: 20px;" class="form-control"
                                            placeholder="Disabled input" wire:model="origin_kabupaten">
                                        <span class="text-danger">@error('origin_kabupaten'){{ $message
                                            }}@enderror</span>
                                    </fieldset>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="disabledTextInput" class="form-label">Kecamatan Asal</label>
                                        <input type="text" id="disabledTextInput"
                                            style="min-height: 60px; border-radius: 20px;" class="form-control"
                                            placeholder="Disabled input" wire:model="origin_kecamatan">
                                        <span class="text-danger">@error('origin_kecamatan'){{ $message
                                            }}@enderror</span>
                                    </fieldset>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="disabledTextInput" class="form-label">Kelurahan Asal</label>
                                        <input type="text" id="disabledTextInput"
                                            style="min-height: 60px; border-radius: 20px;" class="form-control"
                                            placeholder="Disabled input" wire:model="origin_kelurahan">
                                        <span class="text-danger">@error('origin_kelurahan'){{ $message
                                            }}@enderror</span>
                                    </fieldset>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="mb-3">
                        <label for="floatingTextarea2">Detail Alamat</label>
                        <textarea class="form-control" placeholder="Masukan Detail Alamat Kota Asal Anda"
                            placeholder="Masukan Detail Alamat Kota Asal" id=""
                            style="min-height: 150px; border-radius: 20px;"
                            wire:model="detail_alamat_origin"></textarea>
                        <span class="text-danger">@error('detail_alamat_origin'){{ $message }}@enderror</span>
                    </div>
                    <table>
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="disabledTextInput" class="form-label">Provinsi Tujuan</label>
                                        <input type="text" id="disabledTextInput"
                                            style="min-height: 60px; border-radius: 20px;" class="form-control"
                                            placeholder="Disabled input" wire:model="destinasi_provinsi">
                                        <span class="text-danger">@error('destinasi_provinsi'){{ $message
                                            }}@enderror</span>
                                    </fieldset>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="disabledTextInput" class="form-label">Kabupaten Tujuan</label>
                                        <input type="text" id="disabledTextInput"
                                            style="min-height: 60px; border-radius: 20px;" class="form-control"
                                            placeholder="Disabled input" wire:model="destinasi_kabupaten">
                                        <span class="text-danger">@error('destinasi_kabupaten'){{ $message
                                            }}@enderror</span>
                                    </fieldset>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="disabledTextInput" class="form-label">Kecamatan Tujuan</label>
                                        <input type="text" id="disabledTextInput"
                                            style="min-height: 60px; border-radius: 20px;" class="form-control"
                                            placeholder="Disabled input" wire:model="destinasi_kecamatan">
                                        <span class="text-danger">@error('destinasi_kecamatan'){{ $message
                                            }}@enderror</span>
                                    </fieldset>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="disabledTextInput" class="form-label">Kelurahan Tujuan</label>
                                        <input type="text" id="disabledTextInput"
                                            style="min-height: 60px; border-radius: 20px;" class="form-control"
                                            placeholder="Disabled input" wire:model="destinasi_kelurahan">
                                        <span class="text-danger">@error('destinasi_kelurahan'){{ $message
                                            }}@enderror</span>
                                    </fieldset>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <div class="mb-3">
                        <label for="floatingTextarea2">Detail Alamat</label>
                        <textarea class="form-control" placeholder="Masukan Detail Alamat Tujuan Kota Anda" id=""
                            style="min-height: 150px; border-radius: 20px;"
                            wire:model="detail_alamat_destinasi"></textarea>
                        <span class="text-danger">@error('detail_alamat_destinasi'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="paket" class="form-label">Paket</label>
                        <select id="paket" class="form-select" style="min-height: 60px; border-radius: 20px;"
                            wire:model="paket" wire:change="hitungHarga">
                            <option value="">Pilih Paket</option>
                            <option value="1">Paket Simple</option>
                            <option value="2">Paket Platinum</option>
                            <option value="3">Paket All In</option>
                        </select>
                        <span class="text-danger">@error('paket'){{ $message }}@enderror</span>
                    </div>
                    <div>
                        <p>Total Harga</p>
                        @if ($harga !== null)
                        <h1>Rp. {{ number_format($harga, 0, ',', '.') }}</h1>
                        @else
                        <h1>Belum dihitung</h1>
                        @endif
                    </div>
                    <p>(*pastikan data yang anda input sudah benar)</p>
                </div>
            </div>
            @endif

            <div class="d-flex justify-content-end">
                @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                <div></div>
                @endif

                @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                <button type="button" class="btn btn-md btn-secondary"
                    style="margin-right: 10px; height: 60px; border-radius: 20px;"
                    wire:click="decreaseStep()">Sebelumnya</button>
                @endif

                @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                <button type="button" class="btn btn-md btn-success"
                    style="margin-right: 10px; height: 60px; border-radius: 20px; background-color: #00F0FF; color: black;"
                    wire:click="increaseStep()">Selanjutnya</button>
                @endif

                @if ($currentStep == 4)
                <button type="submit"
                    style="margin-right: 100px; height: 60px; border-radius: 20px; background-color: #00F0FF; color: black;"
                    class="btn btn-md btn-info">
                    Kirim
                </button>
                @endif
            </div>

        </div>

    </form>




</div>

<section class="footer1" style="margin-left: -8%; margin-right: -6%;">
    <section class="footer" style="padding-top: 50px;">
        <div class="footer-content">
            <p>Pilar Utama Transindo</p>
            <img src="{{asset('images/logopilar.svg')}}" alt="">

            <div class="icons">
                <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                <a href="#"><i class='bx bxl-linkedin-square'></i></a>
                <a href="#"><i class='bx bxl-youtube'></i></i></a>
            </div>
        </div>

        <div class="footer-content">
            <h4>Alamat</h4>
            <li>
                <h5>Semarang</h5>
            </li>
            <li><a href="#">Jalan lingkar tanjung mas
                    no A 34, Panggung Lor, Kec. Semarang Utara, Kota Semarang, Jawa Tengah 50177</a>
            </li>
            <li>
                <h5>DKI Jakarta</h5>
            </li>
            <li><a href="#">Jalan Rawa Gabus No. 108,
                    Kec Cengkareng, Kota
                    Jakarta Barat - DKI Jakarta</a></li>
            <li>
                <h5>Jawa</h5>
            </li>
            <li><a href="#">Jalan Raya Merak No. 20, Wedoro, Kec Waru,
                    Sidoarjo - Jawa Timur</a></li>
        </div>

        <div class="footer-content">
            <h4>Kontak</h4>
            <li><a href="#">Telepon : 0811-2889-600 </a></li>
            <li><a href="#">Whatsapp : 0811-2889-600 </a></li>
            <li><a href="#">Email : telemarketingpilar@gmail.com</a></li>
        </div>
    </section>
    <hr style="color: #555555;">
    <p style="align-items: center; text-align: center; color: #d6d6d6;">Pilarutamatransindo - Jasa Kirim Barang
        Terpercaya || Wahyu Cahyo Saputra.<span style="color: white;"> Copyright © 2023 - All Rights Reserved</span></p>
</section>

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script>
    new Pikaday({
        field: document.getElementById('date'),
        format: 'MM/DD/YY'
    })
</script>

@endsection