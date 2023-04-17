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
                        <img src="{{ asset('assets/img/lm_logo.png') }}" alt="..." class="w-100 border-radius-lg shadow-sm">
                        <a href="javascript:;" class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                            <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Image"></i>
                        </a>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{Auth::user()->name }}
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
                <h6 class="mb-0"> Master Vendor </h6>
            </div>
            <div class="card-body pt-4 p-3">

                <form action="{{ URL::to('admin/transaksi/pemasukan') }}" method="POST" role="form text-left" id="main_form">
                    @csrf
                        <div id="row_field">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="user-name" class="form-control-label"> Vendor </label>
                                        <select id="kategori_id" name="kategori_id" class="form-select">
                                        <option value="1">Gedung</option>
                                        <option value="2">MUA</option>
                                        <option value="3">Catering</option>
                                        <option value="4">dekor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Alamat</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Harga</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                                <div class="col-md-1 align-self-center">
                                    <input type="button" name="add" id="add" value="add" class="btn btn-success">
                                </div>
                            </div>
                        </div>

                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Simpan" name="simpan" id="btnsimpan" class="btn bg-gradient-dark btn-md mt-4 mb-4">
                            </div>
                </form>
            </div>
        </div>
    </div>


</div>

<script>
    let isi_vendor =
    `
    <div class="row">
        <div class="col-md-2 del">
            <div class="form-group">
                <label for="user-name" class="form-control-label"> Vendor </label>
                <select id="kategori_id" name="kategori_id" class="form-select">
                    <option value="1">Gedung</option>
                    <option value="2">MUA</option>
                    <option value="3">Catering</option>
                    <option value="4">dekor</option>
                </select>
            </div>
        </div>
        <div class="col-md-5 del">
            <div class="form-group">
                <label for="" class="form-control-label">Alamat</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="col-md-3 del">
            <div class="form-group">
                <label for="" class="form-control-label">Harga</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="col-md-1 align-self-center">
            <input type="button" name="remove" id="remove" value="remove" class="btn btn-danger">
        </div>
    </div>
    `;

    $('#add').click(function (e) {
        e.preventDefault();
        $('#row_field').append(isi_vendor);
    });

    $(document).on('click','#remove', function (e) {
        e.preventDefault();
        let row_item = $(this).parent().parent();
        $(row_item).remove();
    });





</script>


@endsection

