@extends('layouts.user_type.auth')

@section('content')

<style>
    table {
        table-layout:fixed;
    }
    td {
        overflow:hidden;
        text-overflow: ellipsis;
    }


    td.details-control {
            text-align:center;
            color:forestgreen;
            cursor: pointer;
    }
    tr.shown td.details-control {
        text-align:center;
        color:red;
    }

</style>

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
                <h6 class="mb-0"> Daftar Event </h6>
            </div>
            <div class="card-body pt-4 p-3">

                <table id="tblevent" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama</th>
                            <th>Event</th>
                            <th>Tanggal</th>
                            <th>Jumlah DP</th>
                            <th>Harga paket</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Nama</th>
                            <th>Event</th>
                            <th>Tanggal</th>
                            <th>Jumlah DP</th>
                            <th>Harga paket</th>
                            <th>Aksi</th>

                        </tr>
                    </tfoot>
                </table>

                <a href="/admin/event/create" class="btn bg-gradient-dark w-15" style="margin-top: 5px; margin-bottom: 5px; margin-left:20px;">Add New Data</a>
            </div>
        </div>
    </div>

    {{-- <!-- Modal --> --}}
    <div class="modal fade mdl-lg" id="mdlevent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Event</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="user-name" class="form-control-label"> Kategori </label>
                            <div class="@error('user.kategori_id')border border-danger rounded-3 @enderror">
                                <select id="kategori_id" name="kategori_id" class="form-select">
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user-name" class="form-control-label"> Nama Lengkap </label>
                            <div class="@error('user.klien_id')border border-danger rounded-3 @enderror">
                                <select id="klien_id" name="klien_id" class="form-select">
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label"> Rekening </label>
                            <div class="@error('user.rekening_id')border border-danger rounded-3 @enderror">
                                <select id="rekening_id" name="rekening_id" class="form-select">
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label"> Event </label>
                                <div class="@error('user.nama_event') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Nama Event" id="nama_event" name="nama_event">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label"> Down Payment </label>
                                <div class="@error('user.dp') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="" id="dp" name="dp">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
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

                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="updateEditEvent">Save changes</button>
            </div>
        </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js" integrity="sha512-OQlawZneA7zzfI6B1n1tjUuo3C5mtYuAWpQdg+iI9mkDoo7iFzTqnQHf+K5ThOWNJ9AbXL4+ZDwH7ykySPQc+A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>


    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Map your choices to your option value
var lookup = {
   'Option 1': ['Option 1 - Choice 1', 'Option 1 - Choice 2', 'Option 1 - Choice 3'],
   'Option 2': ['Option 2 - Choice 1', 'Option 2 - Choice 2'],
   'Option 3': ['Option 3 - Choice 1'],
};

// When an option is changed, search the above for matching choices
$('#options').on('change', function() {
   // Set selected option as variable
   var selectValue = $(this).val();

   // Empty the target field
   $('#choices').empty();

   // For each chocie in the selected option
   for (i = 0; i < lookup[selectValue].length; i++) {
      // Output choice in the target field
      $('#choices').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
   }
});


        let url_kategori = "/admin/event/getKategori";
        let url = "/admin/event/getKlien";
        let url_rekening = "/admin/event/getRekening";

        /* Formatting function for row details - modify as you need */
        function format(d) {
            // `d` is the original data object for the row
            return (
                '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +

                '<tr>' +
                '<td>Keterangan :</td>' +
                '<td>' +
                d.keterangan +
                '</td>' +
                '</tr>' +

                // '<tr>' +
                // '<td>Jumlah DP :</td>' +
                // '<td>' +
                // d.dp +
                // '</td>' +
                // '</tr>' +

                '<tr>' +
                '<td>Alamat :</td>' +
                '<td>' +
                d.alamat +
                '</td>' +
                '</tr>' +

                '<tr>' +
                '<td>Rekening :</td>' +
                '<td>' +
                d.rekening +
                '</td>' +
                '</tr>' +

                '</table>'
            );
        }



        let tblevent = $('#tblevent').DataTable({
            processing : true,
            serverSide: true,
            ajax: "{{ URL::to('admin/event/getEvent') }}",
            autoWidth: false,
            columns: [
                {
                    className: 'details-control',
                    orderable: false,
                    data: null,
                    defaultContent: '',
                    render: function () {
                            return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
                    },
                    width:"15px"
                },
                {data: 'name', name: 'name'},
                {data: 'nama_event', name: 'nama_event'},
                {data: 'tanggal', name: 'tanggal'},
                // {data: 'keterangan', name: 'keterangan'},
                {data: 'dp' , render: $.fn.DataTable.render.number( '.', ',', 0, 'Rp ' ), name: 'dp'},
                {data: 'total_harga', render: $.fn.DataTable.render.number( '.', ',', 0, 'Rp ' ), name: 'total_harga'},
                // {data: 'alamat', name: 'alamat'},
                // {data: 'rekening', name: 'rekening'},
                {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true,
                        "width": "15%"
                },
            ],
            order: [[1, 'asc']],
        });

        // Add event listener for opening and closing details
        $('#tblevent tbody').on('click', 'td.details-control', function () {
                let tr = $(this).closest('tr');
                let tdi = tr.find("i.fa");
                let row = tblevent.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                    tdi.first().removeClass('fa-minus-square');
                    tdi.first().addClass('fa-plus-square');
                }
                else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                    tdi.first().removeClass('fa-plus-square');
                    tdi.first().addClass('fa-minus-square');
                }
        });



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

        getKategori();

        getKlien();

        getRekening();

        $(document).on('click', '#btnedit', function (e) {
            e.preventDefault();
            // alert ("woi");

            let id = $(this).data("id");

            $.ajax({
                type: "GET",
                url: "/admin/event/findevent/" + id,
                dataType: "JSON",
                success: function (response) {
                    $('#id').val( response.id );
                    $('#kategori_id').val( response.kategori_id );
                    $('#klien_id').val( response.klien_id );
                    $('#rekening_id').val( response.rekening_id );
                    $('#nama_event').val( response.nama_event );
                    $('#tanggal').val( response.tanggal );
                    $('#dp').val( response.dp );
                    $('#total_harga').val( response.total_harga );
                    $('#event_keterangan').val( response.keterangan );
                }
            });

            $('#mdlevent').modal('show');
        });

        // btn save event
        $('#updateEditEvent').click(function (e) {
            e.preventDefault();

            let id = $('#id').val();

            // console.log('tombol di klik');

            console.log(id);
            $.ajax({
                type: "POST",
                url: "/admin/master/updateEditEvent",
                dataType: "JSON",
                data: {
                    id: id,
                    kategori_id: $('#kategori_id').val(),
                    klien_id: $('#klien_id').val(),
                    rekening_id: $('#rekening_id').val(),
				    nama_event: $('#nama_event').val(),
			    	tanggal: $('#tanggal').val(),
			    	dp: $('#dp').val(),
			    	total_harga: $('#total_harga').val(),
				    keterangan: $('#event_keterangan').val(),
                    },

                    success: function (response) {
                        $('#mdlevent').modal('hide');
                        $('#tblevent').DataTable().ajax.reload();
                    }
            });

        });

        $(document).on('click', "#deleteProduct", function (e) {
            e.preventDefault();
            // console.log("data di hapus");
            let id = $(this).data("id");
            let token = $(this).data("token");

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "/admin/master/destroy",
                        data: {
                            id: id,
                        },
                        success: function (response) {
                            // $('#tblevent').draw();
                            $('#tblevent').DataTable().ajax.reload();
                            // alert('this is working');
                        }
                    });

                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })


    });

});









</script>



@endsection

