<div>
    <form wire:submit.prevent="updateorder">
        <div>

            @if($currentStep == 1)
        
            <!-- Step 1 -->
            <div class="row" style="margin-top: 100px;">
                <!-- Stepper Progress Bar -->
                <div class="col" style="justify-content: center; text-align: center; align-items:center;">
                    <div class="position-relative m-4">
                        <div class="progress flex-column" role="progressbar" aria-label="Progress 1" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 1px; height: 100px;">
                            <div class="progress-bar" style="height: 0%"></div>
                        </div>
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <button type="button" class="btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
                            <span class="ms-4 align-middle d-inline-block" style="color: rgb(255, 255, 255); font-weight: 700;">Step 1</span>
                        </div>
                    </div>

                    <div class="position-relative m-4">
                        <div class="progress flex-column" role="progressbar" aria-label="Progress 2" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 1px; height: 100px;">
                            <div class="progress-bar" style="height: 0%"></div>
                        </div>
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <button type="button" class="btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">2</button>
                            <span class="ms-4 align-middle d-inline-block" style="color: rgb(255, 255, 255);">Step 2</span>
                        </div>
                    </div>

                    <div class="position-relative m-4">
                        <div class="progress flex-column" role="progressbar" aria-label="Progress 3" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 1px; height: 100px;">
                            <div class="progress-bar" style="height: 0%"></div>
                        </div>
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <button type="button" class="btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">3</button>
                            <span class="ms-4 align-middle d-inline-block" style="color: rgb(255, 255, 255);">Step 3</span>
                        </div>
                    </div>

                    <div class="position-relative m-4">
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <button type="button" class="btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">4</button>
                            <span class="ms-4 align-middle d-inline-block" style="color: rgb(255, 255, 255);">Step 4</span>
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Customer</label>
                        <input type="email" class="form-control" id="" aria-describedby="emailHelp" wire:model="nama">
                        <span class="text-danger">@error('nama'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email Customer</label>
                        <input type="email" class="form-control" id="" aria-describedby="emailHelp" wire:model="email">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">No Whatsapp</label>
                        <input type="email" class="form-control" id="" aria-describedby="emailHelp" wire:model="whatsapp">
                        <span class="text-danger">@error('whatsapp'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" aria-label="Default select example" wire:model="jenis_kelamin">
                            <option selected>Pilih Jenis Kelamin</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        <span class="text-danger">@error('jenis_kelamin'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col">
                    <img src="{{asset ('images/step1.svg')}}" style="height: 500px;">
                </div>
            </div>
            @endif

            @if($currentStep == 2)
        
            <!-- Step 2 -->
            <div class="row" style="margin-top: 100px;">
                <!-- Stepper Progress Bar -->
                <div class="col" style="justify-content: center; text-align: center; align-items:center;">
                    <div class="position-relative m-4">
                        <div class="progress flex-column" role="progressbar" aria-label="Progress 1" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 1px; height: 100px;">
                            <div class="progress-bar" style="height: 100%"></div>
                        </div>
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <button type="button" class="btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
                            <span class="ms-4 align-middle d-inline-block" style="color: rgb(255, 255, 255);">Step 1</span>
                        </div>
                    </div>

                    <div class="position-relative m-4">
                        <div class="progress flex-column" role="progressbar" aria-label="Progress 2" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 1px; height: 100px;">
                            <div class="progress-bar" style="height: 0%"></div>
                        </div>
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <button type="button" class="btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">2</button>
                            <span class="ms-4 align-middle d-inline-block" style="color: rgb(255, 255, 255); font-weight: 700;">Step 2</span>
                        </div>
                    </div>

                    <div class="position-relative m-4">
                        <div class="progress flex-column" role="progressbar" aria-label="Progress 3" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 1px; height: 100px;">
                            <div class="progress-bar" style="height: 0%"></div>
                        </div>
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <button type="button" class="btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">3</button>
                            <span class="ms-4 align-middle d-inline-block" style="color: rgb(255, 255, 255);">Step 3</span>
                        </div>
                    </div>

                    <div class="position-relative m-4">
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <button type="button" class="btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">4</button>
                            <span class="ms-4 align-middle d-inline-block" style="color: rgb(255, 255, 255);">Step 4</span>
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Provinsi</label>
                        <input type="email" class="form-control" id="" aria-describedby="emailHelp" wire:model="home_provinsi">
                        <span class="text-danger">@error('home_provinsi'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Kabupaten</label>
                        <input type="email" class="form-control" id="" aria-describedby="emailHelp" wire:model="home_kabupaten">
                        <span class="text-danger">@error('home_kabupaten'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Kecamatan</label>
                        <input type="email" class="form-control" id="" aria-describedby="emailHelp" wire:model="home_kecamatan">
                        <span class="text-danger">@error('home_kecamatan'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="floatingTextarea2">Detail Alamat</label>
                        <textarea class="form-control" placeholder="Masukan detail alamat lengkap anda" id="" style="height: 100px" wire:model="detail_alamat_home"></textarea>
                        <span class="text-danger">@error('detail_alamat_home'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col">
                    <img src="{{asset ('images/step1.svg')}}" style="height: 500px;">
                </div>
            </div>
            @endif

            @if($currentStep == 3)
        
            <!-- Step 3 -->
            <div class="row" style="margin-top: 100px;">
                <!-- Stepper Progress Bar -->
                <div class="col" style="justify-content: center; text-align: center; align-items:center;">
                    <div class="position-relative m-4">
                        <div class="progress flex-column" role="progressbar" aria-label="Progress 1" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 1px; height: 100px;">
                            <div class="progress-bar" style="height: 100%"></div>
                        </div>
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <button type="button" class="btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
                            <span class="ms-4 align-middle d-inline-block" style="color: rgb(255, 255, 255);">Step 1</span>
                        </div>
                    </div>

                    <div class="position-relative m-4">
                        <div class="progress flex-column" role="progressbar" aria-label="Progress 2" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 1px; height: 100px;">
                            <div class="progress-bar" style="height: 100%"></div>
                        </div>
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <button type="button" class="btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">2</button>
                            <span class="ms-4 align-middle d-inline-block" style="color: rgb(255, 255, 255);">Step 2</span>
                        </div>
                    </div>

                    <div class="position-relative m-4">
                        <div class="progress flex-column" role="progressbar" aria-label="Progress 3" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 1px; height: 100px;">
                            <div class="progress-bar" style="height: 0%"></div>
                        </div>
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <button type="button" class="btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">3</button>
                            <span class="ms-4 align-middle d-inline-block" style="color: rgb(255, 255, 255); font-weight: 700;">Step 3</span>
                        </div>
                    </div>

                    <div class="position-relative m-4">
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <button type="button" class="btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">4</button>
                            <span class="ms-4 align-middle d-inline-block" style="color: rgb(255, 255, 255);">Step 4</span>
                        </div>
                    </div>

                </div>
                <div class="col">
                    <table>
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <label for="" class="form-label">Provinsi</label>
                                    <input type="text" class="form-control" id="" aria-describedby="emailHelp" wire:model="origin_provinsi">
                                    <span class="text-danger">@error('origin_provinsi'){{ $message }}@enderror</span>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <label for="" class="form-label">Kabupaten</label>
                                    <input type="text" class="form-control" id="" aria-describedby="emailHelp" wire:model="origin_kabupaten">
                                    <span class="text-danger">@error('origin_kabupaten'){{ $message }}@enderror</span>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <label for="" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" id="" aria-describedby="emailHelp" wire:model="origin_kecamatan">
                                    <span class="text-danger">@error('origin_kecamatan'){{ $message }}@enderror</span>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <div class="mb-3">
                        <label for="floatingTextarea2">Detail Alamat</label>
                        <textarea class="form-control" placeholder="Masukan detail alamat lengkap anda" id="" style="height: 100px" wire:model="detail_alamat_origin"></textarea>
                        <span class="text-danger">@error('detail_alamat_origin'){{ $message }}@enderror</span>
                    </div>

                    <table>
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <label for="" class="form-label">Provinsi</label>
                                    <input type="text" class="form-control" id="" aria-describedby="emailHelp" wire:model="destinasi_provinsi">
                                    <span class="text-danger">@error('destinasi_provinsi'){{ $message }}@enderror</span>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <label for="" class="form-label">Kabupaten</label>
                                    <input type="text" class="form-control" id="" aria-describedby="emailHelp" wire:model="destinasi_kabupaten">
                                    <span class="text-danger">@error('destinasi_kabupaten'){{ $message }}@enderror</span>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <label for="" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" id="" aria-describedby="emailHelp" wire:model="destinasi_kecamatan">
                                    <span class="text-danger">@error('destinasi_kecamatan'){{ $message }}@enderror</span>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <div class="mb-3">
                        <label for="floatingTextarea2">Detail Alamat</label>
                        <textarea class="form-control" placeholder="Masukan detail alamat lengkap anda" id="" style="height: 100px" wire:model="detail_alamat_destinasi"></textarea>
                        <span class="text-danger">@error('detail_alamat_destinasi'){{ $message }}@enderror</span>
                    </div>

                    <div class="md-form md-outline input-with-post-icon datepicker" id="accLabels">
                        <label for="accessibility-example">Rencana Kirim</label>
                        <input placeholder="Select date" type="text" id="accessibility-example" class="form-control" wire:model="rencana_kirim">
                        <i class="fas fa-calendar input-prefix" tabindex=0></i>
                        <span class="text-danger">@error('rencana_kirim'){{ $message }}@enderror</span>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kendaraan</label>
                        <select class="form-select" aria-label="Default select example" wire:model="armada">
                            <option selected>Pilih Jenis Kelamin</option>
                            <option value="Pickup">Pickup</option>
                            <option value="CDD">CDD</option>
                        </select>
                        <span class="text-danger">@error('armada'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col">
                    <img src="{{asset ('images/step1.svg')}}" style="height: 500px;">
                </div>
            </div>
            @endif

            @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
            <div></div>
            @endif

            @if ($currentStep == 2 || $currentStep == 3)
            <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Sebelumnya</button>
            @endif


            @if ($currentStep == 1 || $currentStep == 2)
            <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Selanjutnya</button>
            @endif

            @if ($currentStep == 3)
            <button type="submit" class="btn btn-md btn-primary">Kirim</button>
            @endif
        </div>

    </form>




</div>