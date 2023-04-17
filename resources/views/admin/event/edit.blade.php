@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ asset ('assets/img/lm_logo.png') }}" alt="..." class="w-100 border-radius-lg shadow-sm">
                        <a href="javascript:;" class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                            <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Image"></i>
                        </a>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ Auth::user()->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            Admin
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Data Event</h6>
            </div>
            <div class="card-body pt-4 p-3">
                @foreach ($data as $dat)

                <form action="" role="form text-left">
                    @csrf
                    @method('PUT')
                    @if($errors->any())
                    <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-text text-white">
                            {{$errors->first()}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                        @endif
                        @if(session('success'))
                        <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                            <span class="alert-text text-white">
                                {{ session('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                            @endif
                            {{-- @foreach ($data as $dat) --}}

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="user-name" class="form-control-label"> Kategori </label>
                                        <div class="@error('user.kategori_id')border border-danger rounded-3 @enderror">
                                            <select id="kategori_id" name="kategori_id" class="form-select" value="{{ $dat->ket}}">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 align-self-center">

                                    <button id="btnkategori" class="btn btn-primary" style="margin-bottom: 0;"> EDIT </button>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="user-name" class="form-control-label"> Nama Lengkap </label>
                                        <div class="@error('user.klien_id')border border-danger rounded-3 @enderror">
                                            <select id="klien_id" name="klien_id" class="form-select">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        <div class="col-md-1 align-self-center">

                            <button id="btnklien" class="btn btn-primary" style="margin-bottom: 0;"> EDIT </button>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label"> Rekening </label>
                                <div class="@error('user.rekening_id')border border-danger rounded-3 @enderror">
                                    <select id="rekening_id" name="rekening_id" class="form-select">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 align-self-center">

                            <button id="btnrekening" class="btn btn-primary" style="margin-bottom: 0; "> EDIT </button>
                        </div>
                    </div>
                    {{-- @endforeach --}}

                    <hr>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label"> Event </label>
                                <div class="@error('user.nama_event') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Nama Event" id="nama_event" name="nama_event">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label"> Tanggal </label>
                                <div class="@error('user.tanggal') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="date" placeholder="" id="tanggal" name="tanggal">
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label"> Down Payment </label>
                                <div class="@error('user.dp') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="" id="dp" name="dp">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label"> Harga Total </label>
                                <div class="@error('user.dp') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="" id="total_harga" name="total_harga">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="about">Keterangan</label>
                        <div class="@error('user.keterangan')border border-danger rounded-3

                        @enderror">
                        <textarea id="event_keterangan" name="keterangan" rows="3" class="form-control"></textarea>
                    </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn bg-gradient-dark btn-md mt-4 mb-4" id="btneventsimpan" type="button"> Simpan </button>
                    </div>
                </form>
                @endforeach

            </div>
        </div>
    </div>
</div>

{{-- modal event --}}
<div class="modal fade " id="mdlevent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Klien</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user-name" class="form-control-label"> Nama Lengkap </label>
                        <div class="@error('user.name')border border-danger rounded-3 @enderror">
                            <input class="form-control" type="text" id="name" name="name">
                                @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user-email" class="form-control-label"> Email Aktif </label>
                        <div class="@error('user.email')border border-danger rounded-3 @enderror">
                            <input class="form-control"  type="email" placeholder="email aktif" id="email" name="email">
                                @error('email')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user-password" class="form-control-label"> Password </label>
                        <div class="@error('password')border border-danger rounded-3 @enderror">
                            <input class="form-control"  type="password" placeholder="" id="password" name="password">
                                @error('password')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user.phone" class="form-control-label"> No. Telephone</label>
                        <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                            <input class="form-control" type="tel" placeholder="nomor telephone(hp)" id="phone" name="phone">
                                @error('phone')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                </div>
            </div>

                <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="user.tanggal_lahir" class="form-control-label"> Tanggal Lahir </label>
                        <div class="@error('user.tanggal_lahir') border border-danger rounded-3 @enderror">
                            <input class="form-control" type="date" placeholder="" id="tanggal_lahir" name="tanggal_lahir">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="user.alamat" class="form-control-label"> Alamat </label>
                        <div class="@error('user.alamat') border border-danger rounded-3 @enderror">
                            <input class="form-control" type="text"  id="alamat" name="alamat">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="user.kota" class="form-control-label"> Kota </label>
                        <div class="@error('user.kota') border border-danger rounded-3 @enderror">
                            <input class="form-control" type="text"  id="kota" name="kota">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="user.provinsi" class="form-control-label"> Provinsi </label>
                            <div class="@error('user.provinsi') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text"  id="provinsi" name="provinsi">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="user.kodepos" class="form-control-label"> Kode Pos </label>
                            <div class="@error('user.kodepos') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text"  id="kodepos" name="kodepos">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user.keterangan" class="form-control-label"> Keterangan </label>
                            <div class="@error('user.keterangan') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text"  id="keterangan" name="keterangan">
                            </div>
                        </div>
                    </div>
                </div>

                    <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="user.bank" class="form-control-label"> Nama Bank </label>
                            <div class="@error('user.bank') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text"  id="bank" name="bank">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="user.no_rekening" class="form-control-label"> Nomor Rekening </label>
                            <div class="@error('user.no_rekening') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text"  id="no_rekening" name="no_rekening">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="user.nama_rekening" class="form-control-label"> Nama Rekening </label>
                            <div class="@error('user.nama_rekening') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text"  id="nama_rekening" name="nama_rekening">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="btnsave" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
</div>

{{-- modal kategori --}}
<div class="modal fade " id="mdlkategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label"> Nama Kategori </label>
                        <div class="@error('user.kategori')border border-danger rounded-3 @enderror">
                            <input class="form-control" type="text" id="kategori" name="kategori">
                                @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label"> Keterangan </label>
                        <div class="@error('user.keterangan')border border-danger rounded-3 @enderror">
                            <textarea name="kat_keterangan" id="kat_keterangan" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="btnsavekategori" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
</div>

{{-- modal rekening --}}
<div class="modal fade " id="mdlrekening" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Rekening</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label"> Bank </label>
                        <div class="@error('user.bank')border border-danger rounded-3 @enderror">
                            <input class="form-control" type="text" id="rek_bank" name="bank">
                                @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="form-control-label"> No Rekening </label>
                        <div class="@error('no_rekening')border border-danger rounded-3 @enderror">
                            <input name="no_rekening" id="rek_no_rekening" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label"> Nama Rekening </label>
                        <div class="@error('nama_rekening')border border-danger rounded-3 @enderror">
                            <input name="nama_rekening" id="rek_nama_rekening" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="btnsaverekening" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

{{-- <script>
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let url = "/admin/event/getKlien";
        let url_kategori = "/admin/event/getKategori";
        let url_rekening = "/admin/event/getRekening";

        // Function GET rekening
        function getRekening() {
            let isi = "";
            $.ajax({
                type: "GET",
                url: "/admin/event/getRekening",
                dataType: "JSON",
                success: function (res) {
                    res.map( r => {
                        isi += `
                        <option value="${r.id}"> ${r.no_rekening}, ${r.nama_rekening}</option>
                        `;
                    })

                    $('#rekening_id').html("");

                    $('#rekening_id').html(isi);
                }
            });
        }

        // Function GET kategori
        function getKategori() {
            let isi = "";
            $.ajax({
                type: "GET",
                url: "/admin/event/getKategori",
                dataType: "JSON",
                success: function (res) {
                    res.map( r => {
                        isi += `
                        <option value="${r.id}"> ${r.kategori}</option>
                        `;
                    })

                    $('#kategori_id').html("");

                    $('#kategori_id').html(isi);
                }
            });
        }

        // Function GET klien
        function getKlien() {
            let isi = "";
            $.ajax({
                type: "GET",
                url: "/admin/event/getKlien",
                dataType: "JSON",
                success: function (res) {
                    res.map( r => {
                        isi += `
                        <option value="${r.id}"> ${r.name}</option>
                        `;
                    })

                    $('#klien_id').html("");

                    $('#klien_id').html(isi);
                }
            });
        }

        getRekening();

        getKategori();

        getKlien();



        // Click event listener klien
        $('#btnklien').click(function (e) {
            e.preventDefault();
            $('#mdlevent').modal('show');
        });

        // Click event listener kategori
        $('#btnkategori').click(function (e) {
            e.preventDefault();
            $('#mdlkategori').modal('show');
        });

        // Click event listener rekening
        $('#btnrekening').click(function (e) {
            e.preventDefault();
            $('#mdlrekening').modal('show');
        });



        // btn save user
        $('#btnsave').click(function (e) {
            e.preventDefault();

            let name = $('#name').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let phone = $('#phone').val();
            let tanggal_lahir = $('#tanggal_lahir').val();
            let alamat = $('#alamat').val();
            let kota = $('#kota').val();
            let provinsi = $('#provinsi').val();
            let kodepos = $('#kodepos').val();
            let keterangan = $('#keterangan').val();
            let bank = $('#bank').val();
            let no_rekening = $('#no_rekening').val();
            let nama_rekening = $('#nama_rekening').val();

            $.ajax({
                type: "POST",
                url: "/admin/event/event",
                data: {
                    name : name,
                    email : email,
                    password : password,
                    phone : phone,
                    tanggal_lahir : tanggal_lahir,
                    alamat : alamat,
                    kota : kota,
                    provinsi : provinsi,
                    kodepos : kodepos,
                    keterangan : keterangan,
                    bank : bank,
                    no_rekening : no_rekening,
                    nama_rekening : nama_rekening,
                },

                success: function (response) {
                    getKlien();

                    $('#mdlevent').modal('hide');
                }
            });
        });

        // btn save kategori
        $('#btnsavekategori').click(function (e) {
            e.preventDefault();

            let kategori = $('#kategori').val();
            let keterangan = $('#kat_keterangan').val();


            $.ajax({
                type: "POST",
                url: "/admin/master/savekategori",
                data: {
                    kategori : kategori,
                    keterangan : keterangan,

                },

                success: function (response) {
                    getKategori();

                    $('#mdlkategori').modal('hide');
                    console.log(response);
                }
            });
        });

        // btn save rekening
        $('#btnsaverekening').click(function (e) {
            e.preventDefault();

            let bank = $('#rek_bank').val();
            let nama_rekening = $('#rek_nama_rekening').val();
            let no_rekening = $('#rek_no_rekening').val();


            $.ajax({
                type: "POST",
                url: "/admin/master/saveRekening",
                data: {
                    bank : bank,
                    nama_rekening : nama_rekening,
                    no_rekening : no_rekening,
                },

                success: function (response) {
                    getRekening();

                    $('#mdlrekening').modal('hide');
                    console.log(response);
                }
            });
        });

        // btn save event
        $('#btneventsimpan').click(function (e) {
            e.preventDefault();


            let klien_id = $('#klien_id').val();
            let kategori_id = $('#kategori_id').val();
            let rekening_id = $('#rekening_id').val();

            let nama_event = $('#nama_event').val();
            let tanggal = $('#tanggal').val();
            let dp = $('#dp').val();
            let keterangan = $('#event_keterangan').val();

            $.ajax({
                type: "POST",
                url: "/admin/master/saveEvent",
                data: {
                    klien_id : klien_id,
                    kategori_id : kategori_id,
                    rekening_id : rekening_id,
                    nama_event : nama_event,
                    tanggal : tanggal,
                    dp : dp,
                    keterangan : keterangan
                },

                success: function (response) {
                    window.location = "/admin/event/event";
                }
            });
        });



    });
</script> --}}
@endsection


