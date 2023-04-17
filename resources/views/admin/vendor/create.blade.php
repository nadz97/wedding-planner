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
                        <img src="{{ asset('/assets/img/lm_logo.png') }}" alt="..." class="w-100 border-radius-lg shadow-sm">
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
                <h6 class="mb-0"> Data Vendor </h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form id="frmvendor" method="post" enctype="multipart/form-data" action="javascript:void(0)"  >

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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label"> Nama Lengkap </label>
                                <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value=""  type="text" placeholder="Nama Vendor" id="user-name" name="name">
                                        @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label"> Email Aktif </label>
                                <div class="@error('email')border border-danger rounded-3 @enderror">
                                    <input class="form-control"  type="email" placeholder="Email Aktif" id="user-email" name="email">
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
                                    <input class="form-control"  type="password" placeholder="" id="user-password" name="password">
                                        @error('password')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.phone" class="form-control-label"> No. Telephone </label>
                                <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="tel" placeholder="Nomor Telp" id="number" name="phone"  >
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
                                    <input class="form-control" type="date" placeholder="Tanggal Lahir" id="tanggal_lahir" name="tanggal_lahir"  >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user.perusahaan" class="form-control-label"> Nama Perusahaan </label>
                                <div class="@error('user.perusahaan') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Nama Perusahaan" id="perusahaan" name="perusahaan"  >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="user.logo" class="form-control-label"> Logo/Gambar </label>
                                <div class="@error('user.logo') border border-danger rounded-3 @enderror">
                                    <input type="file" name="logo" class="form-control" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="user.bidang" class="form-control-label"> Bidang </label>
                            <div class="@error('user.bidang') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" placeholder="Bidang" id="bidang" name="bidang"  >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.location" class="form-control-label"> Alamat </label>
                                <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Alamat"  name="alamat"  >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="user.kota" class="form-control-label"> Kota </label>
                            <div class="@error('user.kota') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" placeholder="Kota"  id="kota" name="kota"  >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="user.provinsi" class="form-control-label"> Provinsi </label>
                            <div class="@error('user.provinsi') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" placeholder="Provinsi" id="provinsi" name="provinsi"  >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label  class="form-control-label"> Kode Pos </label>
                            <div class="@error('user.propinsi') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" placeholder="Kode Pos" id="kodepos" name="kodepos"  >
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-2">
                            <label for="user.bank" class="form-control-label"> Bank </label>
                            <div class="@error('user.bank') border border-danger rounded-3 @enderror">
                              <select name="bank" class="form-select">
                                <option value="bca"> BCA </option>
                                <option value="bri"> BRI </option>
                                <option value="mandiri"> MANDIRI </option>
                                <option value="bni"> BNI </option>
                                <option value="btn"> BTN </option>
                                <option value="danamon"> DANAMON </option>
                                <option value="permata"> PERMATA </option>
                              </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="user.no_rekening" class="form-control-label"> Nomor Rekening </label>
                            <div class="@error('user.no_rekening') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" id="no_rekening" name="no_rekening"  >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="user.nama_rekening" class="form-control-label"> Nama Rekening </label>
                            <div class="@error('user.no_rekening') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" id="nama_rekening" name="nama_rekening"  >
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <label for="about"> Keterangan </label>
                        <div class="@error('user.keterangan')border border-danger rounded-3 @enderror">
                            <textarea class="form-control" rows="3"  name="keterangan"></textarea>
                        </div>
                    </div>

                    <hr>

                    <div class="row" id="rw_layanan">
                      <div class="row" id="dv_layanan">
                        <div class="col-md-3">
                            <label class="form-control-label"> Kategori </label>
                            <div class="@error('user.kategori') border border-danger rounded-3 @enderror">
                              <select name="kategori" id="kategori" class="form-select">

                              </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label  class="form-control-label"> Nama Layanan </label>
                            <div class="@error('user.nama_layanan') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" id="nama_layanan" name="nama_layanan"  >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="user.nama_rekening" class="form-control-label"> Biaya </label>
                            <div class="@error('user.biaya') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" id="biaya" name="biaya"  >
                            </div>
                        </div>
                        <div class="col-md-1">
                          <br>
                          <button id="btnplus" class="btn btn-success">+</button>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <button id="btnminus" class="btn btn-danger">-</button>
                          </div>
                      </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Simpan" id="btnsimpan" name="simpan" class="btn bg-gradient-dark btn-md mt-4 mb-4" >
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(function () {

    $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    let urut = 0;

    function getkategori( slc_kat ) {
      $.ajax({
        type: "GET",
        url: "/admin/master/getkategori",
        dataType: "JSON",
        success: function ( res ) {
          let isi = '';

          console.log( res );

          res.map( r => {
            isi += `
              <option value="${r.kategori}"> ${r.kategori} </option>
            `;
          })

          isi += '<option value="tambah_kategori"> Tambah Kategori </option>';

          $(slc_kat).append( isi );
        }
      });
    }

    getkategori( "#kategori" );

    $('#kategori').change(function (e) {
        e.preventDefault();

        if ( e.target.value == 'tambah_kategori') {
           let kategori = prompt("Masukkan kategori" , "");

           if (( kategori != null) || ( kategori != "")) {
            let isi = `<option value=${kategori}> ${kategori} </option`;
            $("#kategori option").eq(-1).before( isi )
           }
        }
    });

    $('#btnplus').click(function (e) {
        e.preventDefault();
        $("#dv_layanan").clone().appendTo("#rw_layanan");
    });



    // $(document).on('click', '#btnsimpan' , function (e) {
    //    e.preventDefault();


    //    const frm = document.getElementById('frmvendor');

    //    const frmvendor = new FormData( frm);

    //    console.log( frmvendor );

    //    $.ajax({
    //     type: "POST",
    //     url: "{{ URL::to('/admin/master/simpan_vendor') }}",
    //     data: frmvendor,
    //     cache:false,
    //     contentType: false,
    //     processData: false,
    //     success: function (response) {
    //        console.log( response );
    //     }
    //    });

    //    let rw_layanan = $('#rw_layanan option:selected & input[type=text] ');
    //    console.log( rw_layanan.length );

    //     let ven_detail = [];

    //     let rw_layanan = $('input[type=text],option:selected', '#rw_layanan');

    //     for (let i = 0; i < rw_layanan.length ; i += 3) {
    //         ven_detail.push({
    //             "kategori" : $(rw_layanan[i]).val(),
    //             "nama_layanan" : $(rw_layanan[i + 1]).val() ,
    //             "biaya" : $(rw_layanan[i + 2]).val()
    //         });
    //     }

    //     $.ajax({
    //         type: "POST",
    //         url: "{{ URL::to('/admin/master/vendor_detail') }}",
    //         data: {
    //         data : ven_detail
    //         },
    //         success: function (response) {
    //         console.log(response);
    //         }
    //     });

    // });

    $('#frmvendor').submit(function (e) {
      e.preventDefault();
      const frm = new FormData(this)
        $.ajax({
            type: "POST",
            url: "{{ URL::to('/admin/master/simpan_vendor') }}",
            data: frm,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log( response );
                simpan_vendor_detail( response );
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: 'data tersimpan di vendor & vendor detail',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
        });

    function simpan_vendor_detail( vendor_id ) {
    //    let rw_layanan = $('#rw_layanan option:selected & input[type=text] ');
    //    console.log( rw_layanan.length );

       let ven_detail = [];

       let rw_layanan = $('input[type=text],option:selected', '#rw_layanan');

       for (let i = 0; i < rw_layanan.length ; i += 3) {
          ven_detail.push({
            "vendor_id" : vendor_id,
            "kategori" : $(rw_layanan[i]).val(),
            "nama_layanan" : $(rw_layanan[i + 1]).val() ,
            "biaya" : $(rw_layanan[i + 2]).val()
          });
        }

        $.ajax({
            type: "POST",
            url: "{{ URL::to('/admin/master/vendor_detail') }}",
            data: {
              data : ven_detail
            },
            success: function (response) {
              console.log(response);
            }
        });
    }

  });
</script>

@endsection
