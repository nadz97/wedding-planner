@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative min-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <label for="" class="col-form-label col-lg-2 col-md-2 col-sm-2 pe-2 d-flex justify-content-center flex-column">Customer</label>
                <div class="col-lg-6 col-md-5 col-sm-2 pe-2">
                    <input type="text" class="form-control">
                </div>
            </div>
            <hr>
            <form class="row g-3">
                <label for="" class="col-form-label col-lg-2 col-md-2 col-sm-2 pe-2 d-flex justify-content-center flex-column">Pilih gedung</label>
                <div class="col-lg-6 col-md-5 col-sm-2 pe-2">
                    <select id="id1" name="gedung_select" class="form-select">
                        <option value="100000">gedung baru 12</option>
                        <option value="200000">gedung baru 11</option>
                        <option value="300000">gedung baru 15</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-2 pe-2">
                    <div class="input-group">
                        <span class="input-group-text fw-bold">Rp</span>
                        <input type="number"   name="item_total" class=" result1 form-control text-end money" readonly>
                    </div>
                </div>

                <label for="" class="col-form-label col-lg-2 col-md-2 col-sm-2 pe-2 d-flex justify-content-center flex-column">Pilih catering</label>
                <div class="col-lg-6 col-md-5 col-sm-2 pe-2">
                    <select id="id2" name="price" class="form-select">
                        <option value="2000">Pecel</option>
                        <option value="3000">ayam bakar</option>
                        <option value="4000">sate</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-2 pe-2">
                    <div class="input-group">
                        <span class="input-group-text fw-bold">Rp</span>
                        <input type="number"  name="item_total" class=" result2 form-control text-end money" readonly>
                    </div>
                </div>

                <label for="" class="col-form-label col-lg-2 col-md-2 col-sm-2 pe-2 d-flex justify-content-center flex-column">Pilih MUA</label>
                <div class="col-lg-6 col-md-5 col-sm-2 pe-2">
                    <select id="id3" name="mua" class="form-select">
                        <option value="2000000">Hilawa MUA</option>
                        <option value="3000000">Jombang MUA</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-2 pe-2">
                    <div class="input-group">
                        <span class="input-group-text fw-bold">Rp</span>
                        <input type="number"  name="item_total" class=" result3 form-control text-end money" readonly>
                    </div>
                </div>

                <label for="" class="col-form-label col-lg-2 col-md-2 col-sm-2 pe-2 d-flex justify-content-center flex-column">Pilih Gaun</label>
                <div class="col-lg-6 col-md-5 col-sm-2 pe-2">
                    <select id="id4" name="gaun" class="form-select">
                        <option value="2000">no 1</option>
                        <option value="3000">no 2</option>
                        <option value="4000">no 3</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-2 pe-2">
                    <div class="input-group">
                        <span class="input-group-text fw-bold">Rp</span>
                        <input type="number"  name="item_total" class=" result4 form-control text-end money" readonly>
                    </div>
                </div>
                {{-- sub total --}}
                <label for="" class="col-form-label col-lg-8 col-md-8 col-sm-8 pe-2 d-flex justify-content-end flex-column">Sub Total</label>

                <div class="col-lg-3 col-md-2 col-sm-2 pe-2">
                    <div class="input-group">
                        <span class="input-group-text fw-bold">Rp</span>
                        <input id="total" type="number" class="form-control text-end money" readonly>
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
                <div class="col-lg-3 col-md-2 col-sm-2 pe-2">
                    <div class="input-group">
                        <span class="input-group-text fw-bold">Rp</span>
                        <input type="number"  name="fee" id="feetotal" class=" result4 form-control text-end money" readonly>
                    </div>
                </div>
                {{-- total --}}
                <label for="" class="col-form-label col-lg-8 col-md-8 col-sm-8 pe-2 d-flex justify-content-end flex-column">Total</label>

                <div class="col-lg-3 col-md-2 col-sm-2 pe-2">
                    <div class="input-group">
                        <span class="input-group-text fw-bold">Rp</span>
                        <input id="grand_total" type="number" pattern="([0-9]{1,3}).([0-9]{1,3})" class="form-control text-end money" readonly>
                    </div>
                </div>
            </form>
            <hr>
            {{-- payment --}}
            <div class="row g-4">
                <label for="" class="col-form-label col-lg-2 col-md-2 col-sm-2 pe-2 d-flex justify-content-center flex-column">Payment</label>

                <div class="col-lg-3 pe-2">
                    <select id="cicilan" name="cicilan" class="form-select">
                        <option value="1">1x</option>
                        <option value="3">3x</option>
                        <option value="4">4x</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-4" id="rwbayar">

                    </div>
                </div>

            </div>



            <a id="btnvendor" class="btn bg-gradient-dark w-15" style="margin-top: 5px; margin-bottom: 5px; margin-left:20px;">Add New Data</a>
            <a  class="btn bg-gradient-success w-15" style="margin-top: 5px; margin-bottom: 5px; margin-left:20px;">Save</a>

        </div>


    </main>


    <script>
    // let moneys = parseFloat($('.money').val());
    // moneys.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&.');

    $('#btnvendor').click(function (e) {
            e.preventDefault();
            $('#mdlvendor').modal('show');
        });

    $('.money').mask('#,###.###', {reverse: true});
    // display price
    function displayVals() {
        let value1 = $('#id1').val();
        let value2 = $('#id2').val();
        let value3 = $('#id3').val();
        let value4 = $('#id4').val();
        let fee = $('#fee').val();

        $('.result1').val(value1);
        $('.result2').val(value2);
        $('.result3').val(value3);
        $('.result4').val(value4);

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
    $('select').change( displayVals );
    displayVals();

    $("#cicilan").change(function (e) {
        // alert('klik');
        e.preventDefault();
        let isi = '';

        let harga = $('#grand_total').val();
        let cicilan = $('#cicilan').val();

        let termin = harga / cicilan ;

        for (let i = 0; i < cicilan ; i++) {
            isi += `
            <label for="">Bayar ke-${i + 1}</label>
            <input type="text" name="bayar${i}" id="bayar${i}" class="form-control" value="${termin}">
            `;
        }
        $('#rwbayar').html('');
        $("#rwbayar").append(isi);
    });


    </script>
@endsection
