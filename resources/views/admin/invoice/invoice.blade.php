@extends('layouts.user_type.auth')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    <label for="customer" class="form-control-label"> Nama Lengkap </label>
                    <input type="text" name="customer" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="form-control-label"> Tanggal </label>
                    <input class="form-control" type="date" placeholder="" id="tanggal" name="tanggal">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="alamat" class="form-control-label"> Alamat </label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="form-group">
                        <form name="add_vendor" class="add_vendor">
                            <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                    <td class="col-lg-2">
                                        <select id="kategori" name="kategori[]" class="form-select">
                                            <option value="ruang">ruang</option>
                                            <option value="catering">catering</option>
                                            <option value="mua">mua</option>
                                        </select>
                                    </td>
                                    <td class="col-lg-4">
                                        <select id="vendor1" name="vendor[]" class="form-select">
                                            <option value="100000">gedung baru 12</option>
                                            <option value="200000">gedung baru 11</option>
                                            <option value="300000">gedung baru 15</option>
                                        </select>
                                    </td>
                                    <td class="col-lg-3">
                                        <div class="input-group">
                                            <span class="input-group-text fw-bold">Rp</span>
                                            <input type="text" name="item_total" id="result1" class="form-control text-end money" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" id="add" class="btn btn-success">+</button>
                                    </td>
                                </tr>
                            </table>
                        </form>

                            <div class="row g-4" >
                                {{-- sub total --}}
                                <label for="" class="col-form-label col-lg-8 col-md-8 col-sm-8 pe-2 d-flex justify-content-end flex-column">Sub Total</label>

                                <div class="col-lg-2 col-md-2 col-sm-2 pe-2">
                                    <div class="input-group">
                                        <span class="input-group-text fw-bold">Rp</span>
                                        <input id="total" type="text" class="form-control text-end money" readonly>
                                    </div>
                                </div>
                                {{-- fee --}}
                                <label for="" class="col-form-label col-lg-2 col-md-2 col-sm-2 pe-2 d-flex justify-content-center flex-column">fee</label>
                                <div class="col-lg-6 col-md-5 col-sm-2 pe-2">
                                    <select id="fee" name="fee" class="form-select">
                                        <option value="15">15%</option>
                                        <option value="20">20%</option>
                                        <option value="30">30%</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 pe-2">
                                    <div class="input-group">
                                        <span class="input-group-text fw-bold">Rp</span>
                                        <input type="text"  name="fee" id="feetotal" class="form-control text-end money" readonly>
                                    </div>
                                </div>
                                {{-- total --}}
                                <label for="" class="col-form-label col-lg-8 col-md-8 col-sm-8 pe-2 d-flex justify-content-end flex-column">Total</label>

                                <div class="col-lg-2 col-md-2 col-sm-2 pe-2">
                                    <div class="input-group">
                                        <span class="input-group-text fw-bold">Rp</span>
                                        <input id="grand_total" type="text" pattern="([0-9]{1,3}).([0-9]{1,3})" class="form-control text-end money" readonly>
                                    </div>
                                </div>
                            </div>

    {{-- modal customer --}}
    <div class="modal fade " id="mdlcustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Klien</h5>
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

                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>
<script>
    $(document).ready(function() {

        let i = 1;
        // display price
        function displayVals() {
            let value1 = $('#vendor1').val();
            let value2 = $('#vendor2').val();
            let value3 = $('#vendor3').val();
            let value4 = $('#vendor4').val();
            let value5 = $('#vendor5').val();
            let value6 = $('#vendor6').val();
            let value7 = $('#vendor7').val();
            let value8 = $('#vendor8').val();
            let value9 = $('#vendor9').val();
            let value10 = $('#vendor10').val();
            let fee = $('#fee').val();

            $('#result1').val(value1);
            $('#result2').val(value2);
            $('#result3').val(value3);
            $('#result4').val(value4);
            $('#result5').val(value5);
            $('#result6').val(value6);
            $('#result7').val(value7);
            $('#result8').val(value8);
            $('#result9').val(value9);
            $('#result10').val(value10);

            // SUM total value
            function findTotal() {
                let arr = $("[name='item_total']");
                let tot = 0;
                for(let i=0;i<arr.length;i++) {
                    if(parseInt(arr[i].value))
                        tot += parseInt(arr[i].value);
                }
                let subTotal = $('#total').val(tot)
                let feeTotal = $('#feetotal').val((tot * fee) / 100);
                // console.log(typeof feeTotal);
                let grandTotal = $('#grand_total').val(((tot * fee) / 100) + tot);


            }



            findTotal();
        }
        $('#vendor'+[i]).change( displayVals );
        $('#fee').change( displayVals );
        // displayVals();

            $('#add').click(function() {
                i++
                $('#dynamic_field').append(`
                <tr id="row`+i+`">
                    <td class="col-lg-2">
                        <select id="kategori" name="kategori[]" class="form-select">
                            <option value="ruang">ruang</option>
                            <option value="catering">catering</option>
                            <option value="mua">mua</option>
                        </select>
                        </td>
                        <td class="col-lg-4">
                            <select id="vendor`+i+`" name="vendor[]" class="form-select">
                                <option value="100000">gedung baru 12</option>
                                <option value="200000">gedung baru 11</option>
                                <option value="300000">gedung baru 15</option>
                            </select>
                        </td>
                        <td class="col-lg-3">
                            <div class="input-group">
                                <span class="input-group-text fw-bold">Rp</span>
                                <input type="text" name="item_total" id="result`+i+`" class="form-control text-end money" readonly>
                            </div>
                        </td>
                        <td>
                            <button type="button" id="`+i+`" class="btn btn-danger btn_remove">x</button>
                        </td>
                    </tr>`);
                $('#vendor'+[i]).change( displayVals );

            });




        $(document).on('click', '.btn_remove', function() {
            let button_id = $(this).attr('id');
            $("#row"+button_id+"").remove();
        })
    })
</script>
@endsection
