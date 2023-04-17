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
                <h6 class="mb-0"> Pemasukan </h6>
            </div>
            <div class="card-body pt-4 p-3">

                <form action="{{ URL::to('admin/transaksi/pemasukan') }}" method="POST" role="form text-left" id="main_form">
                    @csrf
                    @if($errors->any())
                        <div class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">
                            {{$errors->first()}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="m-3 alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                            <span class="alert-text text-white">
                            {{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    <div class="row" id="createForm">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-control-label"> Sumber Pemasukan </label>
                                <div class="@error('user.sumber')border border-danger rounded-3 @enderror">
                                    <input type="radio" name="sumber" class="sumberpemasukan" id="sumber_client" class="form-radio" value="Client" checked>
                                    <label> Client </label>

                                    <input type="radio" name="sumber" class="sumberpemasukan" id="sumber_lm" class="form-radio" value="lm">
                                    <label> LM </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" id="dvklien" >
                            <div class="form-group">
                                <label class="form-control-label"> Nama Klien </label>
                                <input id="klien_id" name="klien_id" size="30">
                                <span class="text-danger error-text klien_id_error"></span>
                            </div>
                            {{-- <div class="form-group">
                                <label class="form-control-label"> Nama Event</label>
                                <div class="@error('user.klien_id')border border-danger rounded-3 @enderror">

                                    <input id="event_id" name="id" size="30">

                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <strong><span>Nama Event</span></strong>
                            <p id="event"></p>

                        </div>
                        <div class="col">
                            <strong><span>Tanggal</span></strong>
                            <p id="tanggal"></p>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col">
                            <strong><span>Rekening</span></strong>
                            <p id="rekening"></p>
                        </div>
                        <div class="col">
                            <strong><span>DP</span></strong>
                            <p id="dp"></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label"> Nominal </label>
                                <div class="border rounded-3 ">
                                    <input id="nominal" type="text" class="form-control">
                                    <span class="text-danger error-text nominal_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="floatingTextarea">Keterangan</label>
                                <textarea class="form-control" placeholder="Leave a comment here" id="keterangan" name="keterangan"></textarea>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{ asset('js/jquery.easyui.min.js') }}"></script>

<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let event = [];
        let event_id = 0;

        $('#sumber_client').change(function (e) {
            e.preventDefault();
            $('#dvklien').show();
            console.log(e.target.value);
        });

        $('#sumber_lm').change(function (e) {
            e.preventDefault();
            $('#dvklien').hide();
            console.log(e.target.value);
        });




        getevent();



        function getevent() {
            fetch("/admin/pemasukan/getPemasukan2")
                .then( data => data.json() )
                .then( data => {
                    events = [...data];

                    console.log( events );
                    $('#klien_id').combogrid({
                        panelWidth:800,
                        idField:'id',
                        textField:'name',
                        data: events,
                        columns:[[
                            {field:'id',title:'ID',width:30},
                            {field:'name',title:'Nama Klien',width:100},
                            // {field:'nama_event',title:'Nama Event',width:130},
                            // {field:'tanggal',title:'Tanggal Pelaksanaan',width:80,align:'right'},
                            {field:'alamat',title:'Alamat',width:200},
                            // {field:'rekening',title:'Nomor Rekening',width:100,align:'center'}
                        ]],
                        fitColumns: true,
                        onChange: function (id) {

                            const data_klien = events.filter( evn => evn.id == id);


                            data_klien.map ( dt => {
                                $('#event').html( dt.nama_event );
                                $('#tanggal').html( dt.tanggal );
                                $('#rekening').html( dt.rekening );
                                $('#dp').html( dt.dp );
                                // $('#event_id').val( dt.klien_id );
                                event_id = dt.id;

                                console.log('isinya ='  + event_id );
                                console.log(event_id);
                            });
                         }
                    });
            });
        }


        // btn save
        $('#btnsimpan').click(function (e) {
                e.preventDefault();

                let klien_id = $('#klien_id').val();
                let sumber = $('.sumberpemasukan').val();
                let nominal = $('#nominal').val();
                let keterangan = $('#keterangan').val();

                // console.log('ini dijalankan');
                // console.log(event_id);
                // console.log(keterangan);
                $.ajax({
                    type: "POST",
                    url: "/admin/master/savePemasukan",
                    data: {
                        sumber : sumber,
                        klien_id : klien_id,
                        event_id : event_id,
                        nominal : nominal,
                        keterangan : keterangan
                    },

                    success: function (response) {

                        window.location = "/admin/master/pemasukan";
                       }



                });

            });





    });


</script>

@endsection

