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
                <h6 class="mb-0">Data Vendor</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{ URL::to('/admin/master/vendor/' . $data->id) }}" method="POST" role="form text-left" enctype="multipart/form-data">
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label"> Nama Lengkap </label>
                                <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" name="name" value="{{ $data->name }}">
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
                                    <input class="form-control"  type="email" value="{{ $data->email }}" name="email">
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
                                <div class="@error('email')border border-danger rounded-3 @enderror">
                                    <input class="form-control"  type="password" placeholder="" id="user-password" name="password">
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
                                    <input class="form-control" type="tel" value="{{ $data->phone }}" name="phone">
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
                                    <input class="form-control" type="date" value="{{ $data->tanggal_lahir }}" name="tanggal_lahir">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user.perusahaan" class="form-control-label"> Perusahaan </label>
                                <div class="@error('user.perusahaan') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" value="{{ $data->perusahaan }}" name="perusahaan">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="user.logo" class="form-control-label"> Logo/Gambar </label>
                                <div class="@error('user.logo') border border-danger rounded-3 @enderror">
                                    <input type="file" name='logo' class="form-control" id="logo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="user.bidang" class="form-control-label"> Bidang </label>
                            <div class="@error('user.bidang') border border-danger rounded-3 @enderror">
                                <input type="text" id="bidang" name='bidang' class="form-control" value="{{ $data->bidang }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user.alamat" class="form-control-label"> Alamat lengkap </label>
                                <div class="@error('user.alamat') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" value="{{ $data->alamat }}" name="alamat">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="user.provinsi" class="form-control-label"> Provinsi </label>
                                <div class="@error('user.provinsi') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" value="{{ $data->provinsi }}" name="provinsi">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="user.kota" class="form-control-label"> Kota </label>
                                <div class="@error('user.kota') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" value="{{ $data->kota }}" name="kota">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="user.kodepos" class="form-control-label"> Kode Pos </label>
                                <div class="@error('user.kodepos') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" value="{{ $data->kodepos }}" name="kodepos">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-2">
                                <label for="user.bank" class="form-control-label"> Bank </label>
                                <div class="@error('user.bank') border border-danger rounded-3 @enderror">
                                    <select name="bank" id="bank" class="form-control">
                                        <option selected>Pilih Bank</option>
                                        <option {{ ($data->bank == "bca" ? "selected" : "")}} value="bca">PT BANK RAKYAT INDONESIA</option>
                                        <option {{ ($data->bank == "mandiri" ? "selected" : "")}} value="mandiri">PT BANK MANDIRI</option>
                                        <option {{ ($data->bank == "bni" ? "selected" : "")}} value="bni">PT BANK NEGARA INDONESIA</option>
                                        <option {{ ($data->bank == "btn" ? "selected" : "")}} value="btn">PT BANK TABUNGAN NEGARA</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="user.no_rekening" class="form-control-label"> Nomor Rekening </label>
                                    <div class="@error('user.no_rekening') border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="text" value="{{ $data->no_rekening }}" name="no_rekening">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="user.nama_rekening" class="form-control-label"> Nama Rekening </label>
                                    <div class="@error('user.nama_rekening') border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="text" value="{{ $data->nama_rekening }}" name="nama_rekening">
                                    </div>
                                </div>
                            </div>

                                <div class="form-group">
                                    <label for="user.keterangan" class="form-control-label"> Keterangan </label>
                                    <div class="@error('user.keterangan') border border-danger rounded-3 @enderror">
                                        <textarea class="form-control" rows="5" value="{{$data->keterangan}}" name="keterangan"></textarea>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4" name="simpan" id="simpan" value="Simpan">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
